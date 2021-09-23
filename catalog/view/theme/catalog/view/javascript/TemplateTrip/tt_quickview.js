//<![CDATA[
$(window).load(function () {
	tt_quickview.initQuickViewContainer();
});

var tt_quickview = {
	'initQuickViewContainer' : function () {
		$('body').append('<div class="quickview-container"></div>');
		$('div.quickview-container').load('index.php?route=product/tt_quickview/appendcontainer');
	},

	'appendCloseFrameLink' : function () {
		var text_close = $('#qv-text-close').val();
		$('div#quickview-content').prepend("<a href='javascript:void(0);' class='a-qv-close' onclick='tt_quickview.closeQVFrame()'>" + text_close + "</a>");
	},

	'closeQVFrame' : function () {
		$('#quickview-bg-block').hide();
    	$('.quickview-load-img').hide();
    	$('div#quickview-content').hide().html('');
	},

	'ajaxView'	: function (url) {
		if(url.search('route=product/product') != -1) {
			url = url.replace('route=product/product', 'route=product/tt_quickview');
		} else {
			url = 'index.php?route=product/tt_quickview/seoview&ourl=' + url;
		}

		$.ajax({
			url 		: url,
			type		: 'get',
			beforeSend	: function() {
				$('#quickview-bg-block').show();
				$('.quickview-load-img').show();
			},
			success		: function(json) {				
				if(json['success'] == true) {
					$('.quickview-load-img').hide();
					$('#quickview-content').html(json['html']);
					tt_quickview.appendCloseFrameLink();
					$('#quickview-content').show();
					$('#datetimepicker').datetimepicker({
						pickTime: false
					});										
					$('#datetime').datetimepicker({
						pickDate: true,
						pickTime: true
					});
					
					$('#Time').datetimepicker({
						pickDate: false
					});
				}
			}
		});
	}
};
//]]>