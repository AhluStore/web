(function(jQuery,$) {(function(jQuery,$) {
					$(document).ready(function(){
						
					});
					
			
					$(document).ready(function(){
						
					});
					
			
					$(document).ready(function(){
						
					});
					
								$(document).ready(function(){						var reload = function(){							$("#comment-messages .message-time").each(function(i,v){								if($(this).attr("data-time")==undefined){									$(this).attr("data-time",$(this).html().trim());								}								var time = $(this).attr("data-time");								$(this).html(window.Ahlu.Utils.show_date_format(time));							});						};						window.Ahlu.Utils.setInterval(30000,function(){							// asynce data from server							window.Ahlu.Utils.receiveFromURL("/ahluajax-load_comment",{},function(data){								if(data instanceof Object){									var obj = data.d.data;									if(data.d.error==""){										//get all list from menu										//just allow one left, then apply new message										$("#comment-messages .menu-messages").find("li").each(function(i,v){											if(i!=0){												$(this).remove();											}										});										$("#comment-messages .menu-messages").append(data.d.data);										$("#comment-messages").find(".count").html($("#comment-messages .messages-comment").find("li").length-1);																				reload();									}else{										showMessageBar(data.d.error);									}								}else{									showMessageBar(data);								}							},true);														return false;						});						reload();					});								
					$(document).ready(function(){
						
					});
					
			
					$(document).ready(function(){
						
					});
					
			
					$(document).ready(function(){
						
					});
					
			})(jQuery,$);})(jQuery,$);