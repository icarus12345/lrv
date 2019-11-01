@extends('layouts.master.master')

@section('content')
	<!-- Breadcrumbs Area Start -->
	<div class="breadcrumbs-area">
		<div class="container">
			<ul class="breadcrumbs">
				<li><a href="index.html"><i class="fa fa-home"></i>Home</a></li>
				<li class="active">{{$product->name}}</li>
			</ul>
		</div>
	</div>
	<!-- Breadcrumbs Area End -->
	
	<!-- Product Simple Area Start -->
        <div class="single-product-area section-padding-sm pb-0">
            <div class="container">
            
                <div class="row mb-n30">
                
                    <div class="col-lg-4 col-md-5 col-12 mb-30">
                        <div class="single-product-image tab-content">
							@if($product->pictures)
							@foreach($product->pictures as $i=>$image)
                            <div class="tab-pane @if($i==0) active @endif" id="view{{$i}}">
                                <a class="venobox" href="{{$image}}" data-gall="gallery" title="">
									<img src="{{$image}}" alt="">
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endforeach
							@else
							<div class="tab-pane active" id="view1">
                                <a class="venobox" href="{{$product->image}}" data-gall="gallery" title="">
									<img src="{{$product->image}}" alt="">
									<span>View larger<i class="fa fa-search-plus"></i></span>
								</a>
                            </div>
							@endif
                        </div>
                        <div class="single-product-thumb">
                            <div class="thumb-slider">
								@if($product->pictures)
								@foreach($product->pictures as $i=>$image)
                                <a href="#view{{$i}}"><img src="{{$image}}" alt=""></a>
								@endforeach
								@else
                                <a href="#view1"><img src="{{$product->image}}" alt=""></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-5 col-md-7 col-12 mb-30">
                        <div class="single-product-content">
                            <h4 class="title">Blouse</h4>
                            <div class="other-info">
                                <p class="price">£ 32.40 <span>tax incl.</span></p>
                                <p class="reference"><label>Reference: </label> <span>demo_2</span></p>
                                <p class="condition"><label>Condition: </label> <span>New product</span></p>
                            </div>
                            <div class="description">
                                <p>Short-sleeved blouse with feminine draped sleeve detail. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam assumenda earum quidem nobis maxime, hic!</p>
                            </div>
                            <div class="stock-info">
                                <p>297 Items <span class="badge badge-success">In stock</span></p>
                            </div>
                            <div class="size-color-options">
                                <div class="option">
                                    <label>Size</label>
                                    <select>
                                        <option value="volvo">S</option>
                                        <option value="saab">M</option>
                                        <option value="mercedes">L</option>
                                    </select>
                                </div>
                                <div class="option">
                                    <label>Color</label>
                                    <select>
                                        <option value="volvo">Black</option>
                                        <option value="saab">White</option>
                                    </select>                                       
                                </div>
                            </div>
                            <div class="actions">
                                <div class="action single-product-quantity product-quantity">
                                    <button class="dec qtybtn">-</button>
                                    <input type="text" value="1">
                                    <button class="inc qtybtn">+</button>   
                                </div>
                                <a href="cart.html" class="action btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></a>
                                <a href="#" class="action btn box"><i class="fa fa-envelope"></i></a>
                                <a href="#" class="action btn box"><i class="fa fa-print"></i></a>
                            </div>
                            <div class="social-sharing">
                                <a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i>Tweet</a>
                                <a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a>
                                <a href="#" class="btn btn-google-plus"><i class="fa fa-google-plus"></i> Google+</a>
                                <a href="#" class="btn btn-pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                            </div>
                        </div>
                        
                    </div>
                
                    <div class="col-lg-3 col-md-12 col-12 mb-30">
                    
                        <div class="block-title"><h5 class="title">Top sellers</h5></div>
                       
                        <div class="product-slider-5">
                            <div class="single-p-item mb-n25">
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Faded Short Sleeves T-shirt">
                                                <img src="img/featured/1.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Faded Short Sleeves T-shirt">Faded Short Sleeves T-shirt</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 16.84</span>
                                                <span class="old-price">£ 19.81</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div>  
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Blouse">
                                                <img src="img/featured/2.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Blouse">Blouse</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 32.40</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Dress">
                                                <img src="img/featured/3.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Dress">Printed Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 32.20</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div>                                  
                            </div>
                            <div class="single-p-item mb-n25">
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Dress">
                                                <img src="img/featured/4.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Dress">Printed Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 61.19</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                                <!-- Single Product --> 
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Summer Dress">
                                                <img src="img/featured/5.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Summer Dress">Printed Summer Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 34.78</span>
                                                <span class="old-price">£ 36.61</span>
                                            </div>      
                                        </div>
                                    </div>
                                </div> 
                                <!-- Single Product --> 
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Summer Dress">
                                                <img src="img/featured/6.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Summer Dress">Printed Summer Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 36.60</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div> 
                                <!-- Single Product -->                                 
                            </div>  
                            <div class="single-p-item mb-n25">
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Chiffon Dress">
                                                <img src="img/featured/7.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Chiffon Dress">Printed Chiffon Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 21.65</span>
                                                <span class="old-price">£ 24.60</span>
                                            </div>      
                                        </div>
                                    </div>
                                </div>  
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Summer Dress">
                                                <img src="img/featured/2.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Summer Dress">Printed Summer Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 21.65</span>
                                                <span class="old-price">£ 24.60</span>
                                            </div>  
                                        </div>
                                    </div>
                                </div>  
                                <!-- Single Product -->
                                <div class="single-product row mb-3">
                                    <div class="col-lg-6 col-md-4 col-4 mb-2">
                                        <div class="product-img">
                                            <a href="product-details.html" title="Printed Dress">
                                                <img src="img/featured/5.jpg" alt="">
                                            </a>                                            
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-8 mb-2">
                                        <div class="product-content d-flex flex-column">
                                            <h5><a href="product-details.html" title="Printed Dress">Printed Dress</a></h5>
                                            <!--Product Rating-->
                                            <div class="rating-icon mb-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <!--Product Price-->
                                            <div class="product-price">
                                                <span class="new-price">£ 21.65</span>
                                                <span class="old-price">£ 24.60</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>                  
                            </div>                              
                        </div>
                        
                    </div>
                    
                    <div class="col-md-12 mb-30 mt-3">
                        <ul class="nav product-details-tab-list">
                            <li><a class="active" href="#more-info" data-toggle="tab">MORE INFO</a></li>
                            <li><a href="#data" data-toggle="tab">DATA SHEET</a></li>
                            <li><a href="#reviews" data-toggle="tab">REVIEWS</a></li>
                        </ul>
                        <div class="tab-content product-details-tab-content">
                            <div class="tab-pane active" id="more-info">
                                <div class="product-details-description">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="data">
                                <table class="product-details-info-table">
                                    <tbody>
                                        <tr class="odd">
                                            <td>Compositions</td>
                                            <td>Cotton</td>
                                        </tr>
                                        <tr class="even">
                                            <td>Styles</td>
                                            <td>Casual</td>
                                        </tr>
                                        <tr class="odd">
                                            <td>Properties</td>
                                            <td>Short Sleeve</td>
                                        </tr>
                                    </tbody>
                               </table>
                            </div>
                            <div class="tab-pane" id="reviews">
                                <a href="#" class="comment-btn"><span>Be the first to write your review!</span></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Product Simple Area End -->
@endsection
