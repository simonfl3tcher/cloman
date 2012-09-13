$.fn.extend({
	slideRightShow : function(){
		return this.each(function(){
			$(this).show('slide', {direction: 'right'}, 800);
		});
	},

	slideRightHide: function(){
		return this.each(function(){
			$(this).hide('slide', {direction: 'right'}, 800);
		});
	}
})