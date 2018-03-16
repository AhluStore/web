(function(jQuery,$) {
	//add comment
	$.AhluComment = (function(){

		return {
			add : function(data,f){
				if(!data.id_post)return;
				post(site_url_ajax("add_comment"),data,f);
				return this;
			},
			load : function(data,f){
				if(!data.id_post)return;
				post(site_url_ajax("load_comment"),data,f);
				return this;
			}
		};
	})();

	(function() {
	var log = document.createElement("script"); log.type = "text/javascript"; log.async = true;
	log.src = "/plugins_sys/notification//assets/embed.js?lang=vi";
	var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(log, s);
	})();	

		$(function() {
			$(document).bind("ahlu-rate", function(e) {
				$(".ahlu-rate").each(function(i,v){
				  	if(!$(v).hasClass("hasRate")){
				  		$(v).addClass("hasRate")
				  		$(v).find("select").barrating("show", {
						  theme: "my-awesome-theme",
						  onSelect: function(value, text, event) {
							if (typeof(event) !== "undefined") {
							  var id = 	$(event.target).closest(".ahlu-rate").attr("data-id");
							  var txt = $(event.target).attr("data-rating-text");
							  var result = $(event.target).closest(".ahlu-rate").find(".result");
								result.html(txt);
								
								var url = $(event.target).closest(".ahlu-rate").attr("data-url");
							  //send ajax
							    window.Ahlu.Utils.receiveFromURL(url,{id:id,rate:txt},function(e){
											
								},true);
							} else {
							  // rating was selected programmatically
							  // by calling `set` method
							}
						  }
						});
				  	}
				  	
				
				});	
		    });	
			$(document).trigger("ahlu-rate");  
	   });
	window.CURRENCY = "₫";
window.AHLU_URI_E="/plugins_sys/warehouse//Addons/product/";
window.AHLU_E_SESSION="e-cart-ahlu";
window.AHLU_E_CART_TYPE="simple";

loadCSS("/themes/lib//TouchSpin/jquery.bootstrap-touchspin.min.css");
loadJS("/themes/lib//TouchSpin/jquery.bootstrap-touchspin.min.js");
loadJS(AHLU_URI_E+"assets/js/add-to-cart.js");           if(typeof userip!=="string") userip = "120.0.0.1";
           window.addEventListener("load", function load(event){
			     $.ajax({
		            url: "https://geoip.nekudo.com/api/",
		            global: false,
		            type: 'POST',
		            data: {},
		            async: true,
		            success: function(e) {
		            	 try{
				            e = JSON.parse(e.trim());
				        }catch(ex){
				        
				        }
				        //send to server to record
				        userip = e.ip;	
		            }
		        });
			},false);
    
         
	var WEBSITE = "/";       
	function site_url_theme(url){
        return WEBSITE+"/"+url+(url.indexOf("?")!=-1?"&":"?")+"userip="+userip;
    }
    function site_url_theme_upload(url){
        return "/application/ahlu/yeahcheck/users_app/alibaba//theme//upload/"+url;
    }
    function site_url_upload(){
        return "/application/ahlu/yeahcheck/users_app/alibaba//theme//upload.php";
    }
    
    function site_url_ajax(url){
        return WEBSITE+"ahluajax-"+url+(url.indexOf("?")!=-1?"&":"?")+"userip="+userip;
    }
    function site_url(url){
        return WEBSITE+url+(url.indexOf("?")!=-1?"&":"?")+"userip="+userip;
    }
    function no_image(html){
        if(html)return '<img src="'+site_url_theme("no-image.png")+'" />'; 
        return site_url_theme("no-image.png");
    }
    //show message
    function showMessageBar(msg,time){
        if(time) time=3000;
        setTimeout(function() {
            if (typeof msg === "object") {
                msg = JSON.stringify(msg);
            }
            $.bootstrapGrowl(msg, { type: 'success' });
        }, time);
    }
    function messageBox(msg,title){
        if(!title){
            title = "Warning";
        }
         window.Page.Ahlu.UI.Modal(this,{
              init:function(me){
              
                //if(user.order[id]){
                  me.title.html(title);
                  me.content.html(msg); 
                //}
              }
          });
    }
    function showMoney(money){
        return Currency.Format(money,CURRENCY)
    }

    function showAnimation(who){
        var cls =  who.attr("data-animation");
        if(cls)
         who.addClass(cls+" animated").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass(cls+" animated");
         });
    }
    
    function loading(obj){
        obj.find('.loading').remove();
        obj.append('<span class="loading"><img src="'+ROOT_PATH+'/images/loading.gif" style="width:16px;" /></span>');
    }
    function hide_loading(obj){
        obj.find('.loading').remove();
    }
    function bootbox_loading(bootbox){
        bootbox.find('.modal-footer .loading').remove();
        bootbox.find('.modal-footer [data-bb-handler="confirm"]').append('<span class="loading"><img src="'+ROOT_PATH+'/images/loading.gif" style="width:16px;" /></span>');
    }
    function bootbox_loading_hide(bootbox){
        bootbox.find('.modal-footer .loading').remove();
    }

    function ahlu_popup(title,obj,f,buttons){
        if(!buttons)buttons = {
            confirm: {
                label: 'Đóng',
                className: 'btn-success',
                callback : function(){
                    
                },
            }
        };
        var dialog = bootbox.dialog({
            title: title,
            message: '<p><i class="fa fa-spin fa-spinner"></i> Đang tải dữ liệu</p>',
            buttons: buttons
        });
        //result for searching customer
        dialog.init(function(){
            setTimeout(function(){

                dialog.find('.bootbox-body').html(typeof obj==="string"?obj:obj[0].outerHTML);
                if(f instanceof Function)f(dialog);
                setTimeout(function(){
                    dialog.find('.modal-dialog').css({
                        'margin-top': function () {
                            var modal_height = dialog.find('.modal-dialog').height();
                            var window_height = $(window).height();
                            return ((window_height/2) - (modal_height/2));
                        }
                    });
                },100);
            }, 200);
        });
    }$(document).ready(function(){
			setTimeout(function(){
				productCarousel($('#relatedproduct196001473'),4,4,3,4,1);
			},10);
			
		});})(jQuery,$);