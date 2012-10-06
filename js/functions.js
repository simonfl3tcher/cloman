$.fn.extend({
	slideRightShow : function(){
		return this.each(function(){
			$(this).show('slide', {direction: 'right'}, 800);
			$(this).addClass('open');
		});
	},

	slideRightHide: function(){
		return this.each(function(){
			$(this).hide('slide', {direction: 'right'}, 800);
			$(this).removeClass('open');
		});
	},
	slideLeftShow : function(){
		return this.each(function(){
			$(this).show('slide', {direction: 'left'}, 800);
			$(this).addClass('open');
		});
	},

	slideLeftHide: function(){
		return this.each(function(){
			$(this).hide('slide', {direction: 'left'}, 800);
			$(this).removeClass('open');
		});
	}
})