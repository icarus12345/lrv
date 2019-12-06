<?php

namespace App\Services;
use \App\Models\Order;
use Illuminate\Support\Facades\DB;
class Analytics
{

    public static function last7day(){
        $query = DB::table('orders')
            ->select(DB::raw("COALESCE(count(`id`),0) as num, tmp.label, tmp.stat"))
            ->rightJoin(DB::raw("(
                select * 
                    from (
                        select DATE_FORMAT(NOW(),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 1 DAY),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 2 DAY),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 3 DAY),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 4 DAY),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 5 DAY),'%d-%b') as label union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 6 DAY),'%d-%b') as label

                    ) d
                    CROSS JOIN (
                        select 'Requested' as stat union all
                        select 'Approved' as stat union all
                        select 'Unpaid' as stat union all
                        select 'Paid' as stat union all
                        select 'Canceled' as stat union all
                        select 'Done' as stat
                    ) st
                ) tmp "), function ($join) {
                $join->on('tmp.label','=',DB::raw("DATE_FORMAT((`created_at`),'%d-%b')"))
                    ->where(DB::raw("(`created_at`)"),">=",DB::raw("DATE(NOW()) - INTERVAL 7 DAY"))
                    ->where('status',DB::raw('stat'));

            })
            ->orderBy('label','desc')
            ->groupBy(['tmp.label', 'tmp.stat']);
        return $query->get();
    }
    // public function last7week($conditions){
    //     $that = $this;
    //     $query = DB::table('orders')
    //         ->select(DB::raw("COALESCE(sum(`total_amount`),0) as total, tmp.label"))
    //         ->rightJoin(DB::raw("(
    //             select DATE_FORMAT(NOW(),'%b-%d') as label union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 1 WEEK),'%b-%d') union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 2 WEEK),'%b-%d') union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 3 WEEK),'%b-%d') union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 4 WEEK),'%b-%d') union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 5 WEEK),'%b-%d') union all
    //             select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 6 WEEK),'%b-%d')
    //         ) tmp"), function ($join) use ($conditions,$that) {
    //             $join->on('tmp.label','=',DB::raw("DATE_FORMAT(from_unixtime(`created_at`),'%b-%d')"))
    //                 ->where(DB::raw("from_unixtime(`created_at`)"),">=",DB::raw("DATE(NOW()) - INTERVAL 7 WEEK"));
    //             if($conditions){
    //                 $that->_conditions($join,$conditions);
    //             }
    //         })
    //         ->groupBy('tmp.label');
    //     return $query->get();
    // }
    public static function countOrder(){
        return Order::count();

    }
    public static function countNewOrder(){
        return Order::where('status','Requested')->count();

    }
    public static function countPendingOrder(){
        return Order::whereNotIn('status',['Done','Canceled'])->count();

    }
    public static function countOrderThisMonth(){
        return Order::whereRaw(("MONTH(`created_at`) = MONTH(NOW()) AND YEAR(`created_at`) = YEAR(NOW())"))->count();

    }
    public static function last12Month($status = null){
        $query = DB::table('orders')
            ->select(DB::raw("COALESCE(sum(`total_amount`),0) as total, tmp.label"))
            ->rightJoin(DB::raw("(
                select DATE_FORMAT(NOW(),'%Y-%b') as label,0 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 1 MONTH),'%Y-%b') as label,1 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 2 MONTH),'%Y-%b') as label,2 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 3 MONTH),'%Y-%b') as label,3 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 4 MONTH),'%Y-%b') as label,4 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 5 MONTH),'%Y-%b') as label,5 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 6 MONTH),'%Y-%b') as label,6 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 7 MONTH),'%Y-%b') as label,7 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 8 MONTH),'%Y-%b') as label,8 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 9 MONTH),'%Y-%b') as label,9 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 10 MONTH),'%Y-%b') as label,10 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 11 MONTH),'%Y-%b') as label,11 as dt union all
                select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 12 MONTH),'%Y-%b') as label,12 as dt
            ) tmp"), function ($join) use ($status){
                $join->on('tmp.label','=',DB::raw("DATE_FORMAT((`created_at`),'%Y-%b')"))
                    ->where(DB::raw("(`created_at`)"),">=",DB::raw("DATE_ADD(DATE_SUB( LAST_DAY(NOW()), INTERVAL 13 MONTH), INTERVAL 1 DAY)"))
                    ->where('status',$status);

            })
            ->orderBy('dt','desc')
            ->groupBy('tmp.label');
        return $query->get();
    }
    public static function last12Month2(){
        $query = DB::table('orders')
            ->select(DB::raw("COALESCE(sum(`total_amount`),0) as total, tmp.label, tmp.stat"))
            ->rightJoin(DB::raw("(
                select * 
                    from (
                        select DATE_FORMAT(NOW(),'%Y-%b') as label,0 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 1 MONTH),'%Y-%b') as label,1 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 2 MONTH),'%Y-%b') as label,2 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 3 MONTH),'%Y-%b') as label,3 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 4 MONTH),'%Y-%b') as label,4 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 5 MONTH),'%Y-%b') as label,5 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 6 MONTH),'%Y-%b') as label,6 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 7 MONTH),'%Y-%b') as label,7 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 8 MONTH),'%Y-%b') as label,8 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 9 MONTH),'%Y-%b') as label,9 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 10 MONTH),'%Y-%b') as label,10 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 11 MONTH),'%Y-%b') as label,11 as dt union all
                        select DATE_FORMAT(DATE_SUB( NOW(), INTERVAL 12 MONTH),'%Y-%b') as label,12 as dt
                    ) d
                    CROSS JOIN (
                        select 'Pending' as stat union all
                        select 'Done' as stat
                    ) st
                ) tmp "), function ($join) {
                $join->on('tmp.label','=',DB::raw("DATE_FORMAT((`created_at`),'%Y-%b')"))
                    ->where(DB::raw("(`created_at`)"),">=",DB::raw("DATE_ADD(DATE_SUB( LAST_DAY(NOW()), INTERVAL 13 MONTH), INTERVAL 1 DAY)"))
                    ->where(DB::raw("(if(`status` not in ('Done','Canceled'),'Pending',`status`))"),"=",DB::raw('stat'));

            })
            ->orderBy('dt','desc')
            ->groupBy(['tmp.label', 'tmp.stat']);
        return $query->get();
    }
    public static function _condition($query, $condition)
    {
        if (count($condition) == 3) {
            if ($condition[1] == 'in') {
                $query->whereIn($condition[0], $condition[2]);
            } elseif ($condition[1] == 'notin') {
                $query->whereNotIn($condition[0], $condition[2]);
            } elseif (gettype($condition[2]) == 'array') {
                if ($condition[1] == '!=') {
                    $query->whereNotIn($condition[0], $condition[2]);
                } else {
                    $query->whereIn($condition[0], $condition[2]);
                }
            } else {
                $query->where([$condition]);
            }
        } elseif (count($condition) == 2) {
            if (gettype($condition[1]) == 'array') {
                $query->whereIn($condition[0], $condition[1]);
            } else {
                $query->where($condition[0], $condition[1]);
            }
        } else {
        }
    }

    public static function _orcondition($query, $condition)
    {
        if (count($condition) == 3) {
            if ($condition[1] == 'in') {
                $query->orWhereIn($condition[0], $condition[2]);
            } elseif ($condition[1] == 'notin') {
                $query->orWhereNotIn($condition[0], $condition[2]);
            } elseif (gettype($condition[2]) == 'array') {
                if ($condition[1] == '!=') {
                    $query->orWhereNotIn($condition[0], $condition[2]);
                } else {
                    $query->orWhereIn($condition[0], $condition[2]);
                }
            } else {
                $query->orWhere([$condition]);
            }
        } elseif (count($condition) == 2) {
            if (gettype($condition[1]) == 'array') {
                $query->orWhereIn($condition[0], $condition[1]);
            } else {
                $query->orWhere($condition[0], $condition[1]);
            }
        } else {
        }
    }

    public static function _conditions($query, $conditions)
    {

        if ($conditions) {
            if (gettype($conditions[0]) == 'string') {
                $this->_condition($query, $conditions);
            } else {
                $query->where(function ($query) use ($conditions) {
                    $operator = 1;
                    foreach ($conditions as $condition) {
                        if ($condition == 'and') {
                            $operator = 1;
                        } elseif ($condition == 'or') {
                            $operator = 0;
                        } elseif (gettype($condition[0]) == 'string') {
                            if ($operator == 1) {
                                $this->_condition($query, $condition);
                            } else {
                                $this->_orcondition($query, $condition);
                            }
                            $operator = 1;
                        } else {
                            if ($operator == 1) {
                                $this->_conditions($query, $condition);
                            } else {
                                $this->_orconditions($query, $condition);
                            }
                            $operator = 1;
                        }
                    }
                });
            }
        }
    }

    public static function _orconditions($query, $conditions)
    {
        if ($conditions) {
            if (gettype($conditions[0]) == 'string') {
                $this->_orcondition($query, $conditions);
            } else {
                $query->orWhere(function ($query) use ($conditions) {
                    $operator = 1;
                    foreach ($conditions as $condition) {
                        if ($condition == 'and') {
                            $operator = 1;
                        } elseif ($condition == 'or') {
                            $operator = 0;
                        } elseif (gettype($condition[0]) == 'string') {
                            if ($operator == 1) {
                                $this->_condition($query, $condition);
                            } else {
                                $this->_orcondition($query, $condition);
                            }
                            $operator = 1;
                        } else {
                            if ($operator == 1) {
                                $this->_conditions($query, $condition);
                            } else {
                                $this->_orconditions($query, $condition);
                            }
                            $operator = 1;
                        }
                    }
                });
            }
        }
    }

}
