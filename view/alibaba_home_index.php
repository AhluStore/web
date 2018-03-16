      <!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
      <script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
      <script type="text/javascript" src="external/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
      <script src="external/instafeed/instafeed.min.js"></script> 

 <script>
         $(document).ready(function() {

                           // Instagram Feed
            var feed = new Instafeed({
               get: 'user',
               userId: '2324131028',
               clientId: '422b4d6cf31747f7990a723ca097f64e',
               limit: 20,
               sortBy: 'most-liked',
               resolution: "standard_resolution",
               accessToken: '2324131028.422b4d6.d6d71d31431a4e8fbf6cb1efa1a2dfdc',
               template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>'
            });
            feed.run();
            // Revolution Slider
            var windowW = window.innerWidth || $(window).width();
            var fullwidth;
            var fullscreen;

            jQuery(window).resize(sliderOptions);
            sliderOptions();
            function sliderOptions(){
               if (windowW > 767) {
                  fullwidth = "off";
                  fullscreen = "on";   
               } else {
                  fullwidth = "on";
                  fullscreen = "off";  
               }  
            }

              jQuery('.tp-banner').show().revolution(
              {
               dottedOverlay:"none",
               delay:16000,
               startwidth:2048,
               startheight:900,
               hideThumbs:200,
               hideTimerBar:"on",
               
               thumbWidth:100,
               thumbHeight:50,
               thumbAmount:5,
               
               navigationType:"none",
               navigationArrows:"",
               navigationStyle:"",
               
               touchenabled:"on",
               onHoverStop:"on",
               
               swipe_velocity: 0.7,
               swipe_min_touches: 1,
               swipe_max_touches: 1,
               drag_block_vertical: false,
                        
               parallax:"mouse",
               parallaxBgFreeze:"on",
               parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
                        
               keyboardNavigation:"off",
               
               navigationHAlign:"center",
               navigationVAlign:"bottom",
               navigationHOffset:0,
               navigationVOffset:20,
         
               soloArrowLeftHalign:"left",
               soloArrowLeftValign:"center",
               soloArrowLeftHOffset:20,
               soloArrowLeftVOffset:0,
         
               soloArrowRightHalign:"right",
               soloArrowRightValign:"center",
               soloArrowRightHOffset:20,
               soloArrowRightVOffset:0,
                  
               shadow:0,
               fullWidth: fullwidth,
               fullScreen: fullscreen,
         
               spinner:"",
               h_align:"left",
               
               stopLoop:"off",
               stopAfterLoops:-1,
               stopAtSlide:-1,
         
               shuffle:"off",
               
               autoHeight:"off",           
               forceFullWidth:"off",           
                                          
                        
               hideThumbsOnMobile:"off",
               hideNavDelayOnMobile:1500,            
               hideBulletsOnMobile:"off",
               hideArrowsOnMobile:"off",
               hideThumbsUnderResolution:0,
               
               hideSliderAtLimit:0,
               hideCaptionAtLimit:0,
               hideAllCaptionAtLilmit:0,
               startWithSlide:0,
               fullScreenOffsetContainer: "#header"  
              });
         });

</script>
<!-- End HEADER section -->
      <!-- Slider section --> 
      <div class="content offset-top-0" id="slider">
         <!--
            #################################
            - THEMEPUNCH BANNER -
            #################################
            --> 
         <!-- START REVOLUTION SLIDER 3.1 rev5 fullwidth mode -->
         <h2 class="hidden">Slider Section</h2>
         <div class="tp-banner-container">
            <div class="tp-banner">
               <ul>
                     
                  <!-- SLIDE -1 -->
                  <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                     <!-- MAIN IMAGE --> 
                     <img src="images/slides/slide-1.jpg"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" > 
                     <!-- LAYERS --> 
                     <!-- TEXT -->
                     <div class="tp-caption lfl stb" 
                        data-x="205"              
                        data-y="center"    
                        data-voffset="60" 
                        data-speed="600" 
                        data-start="900" 
                        data-easing="Power4.easeOut" 
                        data-endeasing="Power4.easeIn" 
                        style="z-index: 2;">
                        <div class="tp-caption1--wd-1">Spring -Summer 2016</div>
                        <div class="tp-caption1--wd-2">Save 20% on</div>
                        <div class="tp-caption1--wd-3">new arrivals </div>
                        <a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a>
                     </div>
                  </li>
                  <!-- /SLIDE -1 -->
                  <!-- SLIDE 2  -->            
                  <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                     <!-- MAIN IMAGE --> 
                     <img src="images/slides/slide-2.jpg"  alt="slide2"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                     <!-- LAYERS -->
                     <!-- TEXT -->
                     <div class="tp-caption lfr stb" 
                        data-x="right"              
                        data-y="center"    
                        data-voffset="-5"
                        data-hoffset="-205" 
                        data-speed="600" 
                        data-start="900" 
                        data-easing="Power4.easeOut" 
                        data-endeasing="Power4.easeIn" 
                        style="z-index: 2;">
                        <div class="tp-caption2--wd-1">A great selection of superb brands </div>
                        <div class="tp-caption2--wd-2">50% off</div>
                        <div class="tp-caption2--wd-3">on all clothes</div>
                        <a href="listing.html" class="link-button button--border-thick pull-right" data-text="Shop now!">Shop now!</a>
                     </div>                     
                  </li>
                  <!-- /SLIDE 2  -->                  
                  <!-- SLIDE - 3 -->
                  <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
                              <img src="images/slides/04/intro_img_03.jpg"  alt="slide3"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
                           <!-- LAYER NR. 1 -->
                           <div class="tp-caption tp-fade fadeout fullscreenvideo"
                              data-x="0"
                              data-y="0"
                              data-speed="1000"
                              data-start="1100"
                              data-easing="Power4.easeOut"
                              data-endspeed="1500"
                              data-endeasing="Power4.easeIn"
                              data-autoplay="true"
                              data-autoplayonlyfirsttime="false"
                              data-nextslideatend="true"
                              data-forceCover="1"
                              data-dottedoverlay="twoxtwo"
                              data-aspectratio="16:9"
                              data-forcerewind="on"
                              style="z-index: 2">


                              <video class="video-js vjs-default-skin" preload="none" 
                                 poster='images/slides/video/video_img.jpg' data-setup="{}">
                                 <source src='images/slides/video/explore.mp4' type='video/mp4' />
                                 <source src='images/slides/video/explore.webm' type='video/webm' />
                                 <source src='images/slides/video/explore.ogv' type='video/ogg'  />
                              </video>

                           </div>
                           <!-- TEXT -->
                        <div class="tp-caption lfb stb" 
                        data-x="center"              
                        data-y="center"    
                        data-voffset="0"
                        data-hoffset="0" 
                        data-speed="600" 
                        data-start="900" 
                        data-easing="Power4.easeOut" 
                        data-endeasing="Power4.easeIn" 
                        style="z-index: 2;">
                        <div class="tp-caption3--wd-1 color-white">Spring -Summer 2016</div>
                        <div class="tp-caption3--wd-2">Season sale!</div>
                        <div class="tp-caption3--wd-3 color-white">Get huge</div>
                        <div class="tp-caption3--wd-3 color-white">savings!</div>
                        <div class="text-center"><a href="listing.html" class="link-button button--border-thick" data-text="Shop now!">Shop now!</a></div>
                     </div>   
                  
                  </li>
                  <!-- /SLIDE - 3 -->  
                              
                  
                  
               </ul>
            </div>
         </div>
      </div>
      <!-- END REVOLUTION SLIDER --> 
      <!-- CONTENT section -->
      <div id="pageContent">
         <!-- category section -->
         <div class="content">
            <div class="container">
               <div class="row">
                  <div class="category-carousel">
                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <a href="listing.html" class="banner zoom-in">
                           <span class="figure">
                              <img src="images/custom/category-3.jpg" alt=""/>
                              <span class="figcaption">
                                 <span class="block-table">
                                    <span class="block-table-cell">
                                       <span class="banner__title size5">women’s</span>
                                       <span class="btn btn--ys btn--xl">Shop now!</span>
                                    </span>
                                 </span>
                              </span>
                           </span>
                        </a>
                     </div>
                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <a href="listing.html" class="banner zoom-in">
                        <span class="figure">
                           <img src="images/custom/category-2.jpg" alt=""/>
                           <span class="figcaption">
                              <span class="block-table">
                                 <span class="block-table-cell">
                                    <span class="banner__title size5">aCCESSORIES</span>
                                    <span class="btn btn--ys btn--xl">Shop now!</span>
                                 </span>
                              </span>
                           </span>
                        </span>
                        </a>
                     </div>
                     <div class="col-sm-4 col-md-4 col-lg-4">
                        <a href="listing.html" class="banner zoom-in">
                        <span class="figure">
                           <img src="images/custom/category-1.jpg" alt=""/>
                           <span class="figcaption">
                              <span class="block-table">
                                 <span class="block-table-cell">
                                    <span class="banner__title size5">men’s</span>
                                    <span class="btn btn--ys btn--xl">Shop now!</span>
                                 </span>
                              </span>
                           </span>
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /category section -->
         <div  class="content">
			<div class="container">
            <div class="shortcode">
               [AhluFlashSale title="Sản phẩm giảm giá mỗi ngày tại Ahlustore"]
             </div>
				<div class="shortcode">
			      [Ahlu_E_API kind="featured" col="4" title="Sản phẩm nổi bật" page="1" limit="8" swipe="false"]
			    </div>
			</div>
		</div>

         <!-- banners -->
         <div class="content fullwidth indent-col-none">
            <div class="container">
               <div class="row">
                  <div class="banner-carousel">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="listing.html" class="banner zoom-in">
                        <span class="figure">
                           <img src="images/custom/banner-01.jpg" alt=""/>
                           <span class="figcaption">
                              <span class="block-table">
                                 <span class="block-table-cell">
                                    <span class="banner__title size3">Hats</span>
                                    <span class="text">GET UP TO</span>
                                    <span class="text size3">20% OFF</span>
                                 </span>
                              </span>
                           </span>
                        </span>
                        </a>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="listing.html" class="banner zoom-in">
                           <span class="figure">
                              <img src="images/custom/banner-02.jpg" alt=""/>
                              <span class="figcaption">
                                 <span class="block-table">
                                    <span class="block-table-cell">
                                       <span class="banner__title size3-1">15% OFF</span>
                                       <span class="text size1"><em>on brand-new models</em></span>
                                       <span class="btn btn--ys btn--xl">Shop now!</span>
                                    </span>
                                 </span>
                              </span>
                           </span>
                        </a>
                     </div>
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <a href="listing.html" class="banner zoom-in">
                           <span class="figure">
                              <img src="images/custom/banner-03.jpg" alt=""/>
                              <span class="figcaption">
                                 <span class="block-table">
                                    <span class="block-table-cell">
                                       <span class="banner__title size4">New<br> collection</span>
                                       <span class="text size2">OF FASHION CLOTHES</span>
                                       <span class="btn btn--ys btn--xl offset-top">Shop now!</span>
                                    </span>
                                 </span>
                              </span>
                           </span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /banners -->
         <!-- news & sale products -->
         <div class="content">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12 col-md-6 col-xl-4">
                     <div class="shortcode">
				      	[Ahlu_E_API kind="latest" col="2" title="Sản phẩm mới nhất" page="1" limit="8" swipe="true"]
				     </div>
                  </div>
                  <!-- promo -->
                  <div class="col-xl-4 visible-xl">
                     <!-- title -->
                     <div class="title-box">
                        <h2 class="text-left text-uppercase title-under pull-left">PROMOS</h2>
                     </div>
                     <!-- /title -->
                     <div class="text-center promos">
                        
                        <div class="promos__image">
                           <a href="lookbook.html" class="link-img-hover">
                           <img src="images/custom/promos.jpg" class="img-responsive" alt="">
                           <span class="promos__label">-20%</span>
                           </a>
                        </div>
                        <h2><a href="lookbook.html">Mauris lacinia lectus</a></h2>
                        Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis.
                     </div>
                  </div>
                  <!-- /promo -->                  

                  <div class="col-sm-12 col-md-6 col-xl-4">
                     <div class="divider--lg visible-sm visible-xs"></div>
                     
                      <div class="shortcode">
					      [Ahlu_E_API kind="discount" col="2" title="Sản phẩm giảm giá" page="1" limit="8" swipe="true"]
					   </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /news & sale products -->
         <!-- blog slider -->
         <div class="content content-bg-1 fixed-bg">
            <div class="container">          
               <div class="row">
                  <h2 class="text-center text-uppercase title-under">testimonials</h2>
                  <div class="slider-blog slick-arrow-bottom">
                     <!-- slide-->
                     <a href="blog-post-right-column.html" class="link-hover-block">
                        <div class="slider-blog__item">
                           <div class="row">
                              <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                 <img src="images/custom/slider-blog-img01.jpg" alt="">
                              </div>
                              <div class="col-xs-12 col-sm-5 col-xl-4 box-data">
                                 <h6>Eleanor  <em>&nbsp;-&nbsp;  designer</em></h6>
                                 <p>
                                    Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis. In est arcu, sollicitudin eu, vehicula venenatis, sociis natoque penatibus et magnis. Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </a>
                     <!-- /slide-->
                     <!-- slide-->
                     <a href="blog-post-right-column.html" class="link-hover-block">
                        <div class="slider-blog__item">
                           <div class="row">
                              <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                 <img src="images/custom/slider-blog-img02.jpg" alt="">
                              </div>
                              <div class="col-xs-12 col-sm-5 box-data">
                                 <h6>Piper  <em>&nbsp;-&nbsp;  designer</em></h6>
                                 <p>
                                    Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis. In est arcu, sollicitudin eu, vehicula venenatis, sociis natoque penatibus et magnis. Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </a>
                     <!-- /slide-->
                     <!-- slide-->
                     <a href="blog-post-right-column.html" class="link-hover-block">
                        <div class="slider-blog__item">
                           <div class="row">
                              <div class="col-xs-12 col-sm-2 col-sm-offset-3 box-foto">
                                 <img src="images/custom/slider-blog-img03.jpg" alt="">
                              </div>
                              <div class="col-xs-12 col-sm-5 box-data">
                                 <h6>MARK   <em>&nbsp;-&nbsp;  designer</em></h6>
                                 <p>
                                    Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet, nunc. Ut sit amet turpis. In est arcu, sollicitudin eu, vehicula venenatis, sociis natoque penatibus et magnis. Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </a>
                     <!-- /slide-->
                  </div>
               </div>
            </div>
         </div>
         <!-- /blog slider -->
         <!-- recent-posts-carousel -->
         <div class="content">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     <!-- title -->
                     <div class="title-with-button">
                        <div class="carousel-products__button pull-right">
                           <span class="btn-prev"></span>
                           <span class="btn-next"></span>        
                        </div>
                        <h2 class="text-center text-uppercase title-under">RECENT POSTS</h2>
                     </div>
                     <!-- /title -->
                     <!-- carousel-new -->
                     <div class="carousel-products row" id="postsCarousel">
                        <!-- slide-->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                    <span class="figure">
                                       <img src="images/custom/recent-posts-01.jpg" alt="">
                                       <span class="figcaption label-top-left">
                                          <span>
                                             <b>26</b>
                                             <em>jun</em>
                                          </span>
                                       </span>
                                    </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <div class="recent-post-box__text">
                                    <h4><a href="blog-post-right-column.html">Mauris lacinia lectus</a></h4>
                                    <div class="author">by <b>Admin</b></div>
                                    <p>
                                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                    </p>
                                    <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                 </div>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                        <!-- slide -->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                 <span class="figure">
                                 <img src="images/custom/recent-posts-02.jpg" alt="">
                                 <span class="figcaption label-top-left">
                                 <span>
                                 <b>26</b>
                                 <em>jun</em>
                                 </span>
                                 </span>
                                 </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <div class="recent-post-box__text">
                                    <h4><a href="blog-post-right-column.html">Lorem ipsum dolor</a> </h4>
                                    <div class="author">by <b>Admin</b></div>
                                    <p>
                                       Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                    </p>
                                    <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                 </div>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                        <!-- slide -->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                 <span class="figure">
                                 <img src="images/custom/recent-posts-03.jpg" alt="">
                                 <span class="figcaption label-top-left">
                                 <span>
                                 <b>26</b>
                                 <em>jun</em>
                                 </span>
                                 </span>
                                 </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <div class="recent-post-box__text">
                                    <h4><a href="blog-post-right-column.html">dolore magna aliqua</a></h4>
                                    <div class="author">by <b>Admin</b></div>
                                    <p>
                                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                    </p>
                                    <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                 </div>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                        <!-- slide-->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                 <span class="figure">
                                 <img src="images/custom/recent-posts-01.jpg" alt="">
                                 <span class="figcaption label-top-left">
                                 <span>
                                 <b>26</b>
                                 <em>jun</em>
                                 </span>
                                 </span>
                                 </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <div class="recent-post-box__text">
                                    <h4><a href="blog-post-right-column.html">Mauris lacinia lectus</a></h4>
                                    <div class="author">by <b>Admin</b></div>
                                    <p>
                                       Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                    </p>
                                    <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                 </div>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                        <!-- slide -->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                 <span class="figure">
                                 <img src="images/custom/recent-posts-02.jpg" alt="">
                                 <span class="figcaption label-top-left">
                                 <span>
                                 <b>26</b>
                                 <em>jun</em>
                                 </span>
                                 </span>
                                 </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <div class="recent-post-box__text">
                                    <h4><a href="blog-post-right-column.html">Lorem ipsum dolor</a> </h4>
                                    <div class="author">by <b>Admin</b></div>
                                    <p>
                                       Dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                    </p>
                                    <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                                 </div>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                        <!-- slide -->
                        <div class="col-sm-3 col-xl-6">
                           <!--  -->
                           <div class="recent-post-box">
                              <div class="col-lg-12 col-xl-6">
                                 <a href="blog-post-right-column.html">
                                 <span class="figure">
                                 <img src="images/custom/recent-posts-03.jpg" alt="">
                                 <span class="figcaption label-top-left">
                                 <span>
                                 <b>26</b>
                                 <em>jun</em>
                                 </span>
                                 </span>
                                 </span>
                                 </a>
                              </div>
                              <div class="col-lg-12 col-xl-6">
                                 <h4><a href="blog-post-right-column.html">dolore magna aliqua</a></h4>
                                 <div class="author">by <b>Admin</b></div>
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, rhoncus eget, laoreet sit amet.
                                 </p>
                                 <a class="link-commet" href="blog-post-right-column.html"><span class="icon icon-message "></span><span class="number">0</span> comment(s)</a>
                              </div>
                           </div>
                           <!-- / -->
                        </div>
                        <!-- /slide -->
                     </div>
                     <!-- /carousel-new -->
                  </div>
               </div>
            </div>
         </div>
         <!-- /recent-posts-carousel -->
         <!-- brands-carousel -->
         <div class="content section-indent-bottom">
            <div class="container">
               <div class="row">
                  <div class="brands-carousel">
                     <div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-01.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-02.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-03.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-04.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-05.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-06.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-07.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-08.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-09.png" alt=""></a></div>
                     <div><a href="#"><img src="images/custom/brand-10.png" alt=""></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /brands-carousel -->
         <div class="content fullwidth hidden-xs">
            <div class="container">
               <div class="row">
                  <div class="instafeed-wrapper">
                     <h3 class="title-vertical"><span>INSTAGRAM FEED</span></h3>
                     <div id="instafeed" class="instafeed"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
                  

