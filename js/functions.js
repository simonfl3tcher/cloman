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

String.prototype.toHHMMSS = function () {
    sec_numb    = parseInt(this);
    var hours   = Math.floor(sec_numb / 3600);
    var minutes = Math.floor((sec_numb - (hours * 3600)) / 60);
    var seconds = sec_numb - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    var time    = hours+':'+minutes+':'+seconds;
    return time;
}
