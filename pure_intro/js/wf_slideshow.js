(function ($) {
	 var wfslideshow = function (element, options) {
        this.$element = $(element);
        this.options = $.extend({}, $.fn.wfslideshow.defaults, options, this.$element.data());
		
		this.offset = 0;
        this.init();  
     };
	 
	 wfslideshow.prototype = {
        constructor: wfslideshow, 
        init: function () {
			
            var html = '<div class="slideshow_button slideshow_previous slideshow_transparent wf_slide_show_btn" route="pre" role="button" style="display:none;"></div><div class="slideshow_button slideshow_next slideshow_transparent" route="next" role="button"></div><div class="wf-slideshow-content">';		
           
			
			var phone_class = 'col-xs-'+Math.floor(12/this.options.itemPhone);			
			var tablet_class = 'col-md-'+Math.floor(12/this.options.itemTablet);
			var desktop_class = 'col-lg-'+Math.floor(12/this.options.itemDesktop);
			this.itemClass = phone_class+' '+tablet_class+' '+desktop_class;
			
			this.resize($(window).width());
			
			
			
			
			defaultHtml = '<div class="col-xs-12 '+this.options.classItem+'">'+'<div class="'+this.options.classAvatar+'"></div>'+'<div class="'+this.options.classTitle+'"></div>'+'<div class="'+this.options.classDesc+'"></div>'+'</div>';
			
			if(this.options.data.length ==0){
				 html += defaultHtml;
			}else{
				html += this.renderHtml(this.options.data);
			}
			html += '</div>';
            this.$element.html(html);
			
			var wfslideshow = this;
			
			
			if(this.options.data.length ==0){
				$.ajax({
					url: wfslideshow.options.url,
					data: {'limit':wfslideshow.limit,'offset':wfslideshow.offset},
					dataType: "json",
					beforeSend: function(){
						wfslideshow.$element.find('.wf-slideshow-content').css('opacity','0.5');
					},
					success: function(result){
						wfslideshow.$element.find('.wf-slideshow-content').css('opacity','1');
						html = wfslideshow.renderHtml(result);	
						wfslideshow.$element.find('.wf-slideshow-content').html(html);
						
					}
				 });
			}
				
				
			$( window ).resize(function() {
			  wfslideshow.resize($( window ).width());
			});
			
			
			if(this.options.classActive != ''){		
				this.$element.find('.'+phone_class).click(function(e){
					alert();
					e.preventdefault();
					wfslideshow.$element.find('.'+phone_class).removeClass();
					$(this).addClass(wfslideshow.options.classActive);
				});
			}
			
			this.$element.find('.slideshow_button').click(function(){	
				var role = $(this).attr('route');
				if(role == 'next'){
					wfslideshow.offset = wfslideshow.offset+wfslideshow.limit;
				}else{
					wfslideshow.offset = wfslideshow.offset - wfslideshow.limit;	
					if(wfslideshow.offset<0){
						wfslideshow.offset = 0;
					}
				}
						
				$.ajax({
					url: wfslideshow.options.url,
					data: {'limit':wfslideshow.limit,'offset':wfslideshow.offset},
					dataType: "json",
					beforeSend: function(){
						wfslideshow.$element.find('.wf-slideshow-content').css('opacity','0.5');
					},
					success: function(result){
						wfslideshow.$element.find('.wf-slideshow-content').css('opacity','1');
						html = wfslideshow.renderHtml(result);
						if(wfslideshow.offset!=0){
							wfslideshow.$element.find('.slideshow_previous').show();
						}else{
							wfslideshow.$element.find('.slideshow_previous').hide();
						}
						
						if(result.length < wfslideshow.limit){
							wfslideshow.$element.find('.slideshow_next').hide();
						}else{
							wfslideshow.$element.find('.slideshow_next').show();
						}
						wfslideshow.$element.find('.wf-slideshow-content').html(html);
						
					}
				 });
				
				 
			});
			
			
			//wfslideshow = null;
			
        },
		
		resize: function(size){
			if(size < 780){
				this.device = 'xs';
				this.limit = this.options.itemPhone;
			}else if(size < 1000){
				this.device = 'md';
				this.limit = this.options.itemTablet;
			}else{
				this.device = 'lg';
				this.limit = this.options.itemDesktop;
			}
			return this.device;
		},
		
		renderHtml: function(data){
			var options = this.options;			
			var html = '';
			var itemClass = this.itemClass;
			$.each(data, function( i,item ){
				j = i+1;
				var item_class_reponsive = itemClass;
				if(j>options.itemTablet){
					item_class_reponsive += ' '+'hidden-md';
				}
				if(j>options.itemPhone){
					item_class_reponsive += ' '+'hidden-sm';
				}
				html += '<div class="'+item_class_reponsive+'">'+
									'<div class="'+options.classItem+' '+'bg-'+options.color[i]+'" >'+
									'<div class="'+options.classAvatar+' border-'+options.classborderAvartar[i]+'"><a href="'+item.link+'" ><img src="'+item.image+'" data-image="'+item.image_max+'" class="wp-post-image"/></a></div>'+
									'<div class="'+options.classTitle+'"><a href="'+item.link+'">'+item.title+'</a></div>';
				if(options.classDesc != ''){
					html += '<div class="summary-item-news">'+item.desc+'</div>';
				}
				if(options.classMore != ''){
					html += '<div class="'+options.classMore+'"><a href="'+item.link+'">Tìm hiểu thêm &nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-play-circle"></i></a></div>';
				}
				html += '</div></div>';
			});
			
			
			if(options.onclick !== null){
				html = $(html);
				
				html.find("a").bind('click',function (e) {
					e.preventDefault();
					options.onclick($(this));
				});
				
			}
			
			return html;
		}
		
		
	};
	
	$.fn.wfslideshow = function ( option ) {
    	
        var d, args = Array.apply(null, arguments);
        args.shift();
       
        //getValue returns date as string / object (not jQuery object)
        if(option === 'getValue' && this.length && (d = this.eq(0).data('wfslideshow'))) {
          return d.getValue.apply(d, args);
        }        
        return this.each(function () {
            var $this = $(this),
            data = $this.data('wfslideshow'),            
            options = typeof option == 'object' && option;
            if (!data) {
                $this.data('wfslideshow', (data = new wfslideshow(this, options)));
            }
            if (typeof option == 'string' && typeof data[option] == 'function') {
                data[option].apply(data, args);
            }
        });
    }; 
	
	$.fn.wfslideshow.defaults = {
        url: '', 
		classItem: 'item-news',
		color: [],
		classActive: '',
		classAvatar: 'avatar-item-news',
		classborderAvartar: [],
		classTitle: 'title-item-news',
		classDesc: '',
		classMore: '',
		itemPhone: 2,
		itemDesktop: 4,
		itemTablet: 3,
		step: 0,
		onclick: null,
		data: []
    };
}(window.jQuery));