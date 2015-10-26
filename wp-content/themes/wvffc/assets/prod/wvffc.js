function tamingselect()
{

	var cat = '';
	var reg = '';
	var ft = [];

	if(!document.getElementById && !document.createTextNode){return;}

// Classes for the link and the visible dropdown
	var ts_selectclass='turnintodropdown'; 	// class to identify selects
	var ts_listclass='turnintoselect';		// class to identify ULs
	var ts_boxclass='dropcontainer'; 		// parent element
	var ts_triggeron='activetrigger'; 		// class for the active trigger link
	var ts_triggeroff='trigger';			// class for the inactive trigger link
	var ts_dropdownclosed='dropdownhidden'; // closed dropdown
	var ts_dropdownopen='dropdownvisible';	// open dropdown
/*
	Turn all selects into DOM dropdowns
*/
	var count=0;
	var toreplace=new Array();
	var sels=document.getElementsByTagName('select');

	var current_region = "All Regions";

	for(var i=0;i<sels.length;i++){
		if (ts_check(sels[i],ts_selectclass))
		{
			var hiddenfield=document.createElement('input');
			hiddenfield.name=sels[i].name;
			hiddenfield.type='hidden';
			hiddenfield.id=sels[i].id;
			hiddenfield.value=sels[i].options[0].value;
			sels[i].parentNode.insertBefore(hiddenfield,sels[i]);
			var trigger=document.createElement('a');
			ts_addclass(trigger,ts_triggeroff);

			str=sels[i].options[0].value;
			str = str.replace(" ","-");

			// Add in the full URL to str when switching domains

			trigger.href='#';

			trigger.onclick=function(){
				ts_swapclass(this,ts_triggeroff,ts_triggeron)
				ts_swapclass(this.parentNode.getElementsByTagName('ul')[0],ts_dropdownclosed,ts_dropdownopen);
				return false;
			}
			trigger.appendChild(document.createTextNode(sels[i].options[0].text));
			sels[i].parentNode.insertBefore(trigger,sels[i]);
			var replaceUL=document.createElement('ul');
			for(var j=0;j<sels[i].getElementsByTagName('option').length;j++)
			{
				var newli=document.createElement('li');
				var newa=document.createElement('a');
				newli.v=sels[i].getElementsByTagName('option')[j].value;
				newli.elm=hiddenfield;
				newli.istrigger=trigger;

				// Add in the full URL to str when switching domains

				newa.href="#";

				newa.appendChild(document.createTextNode(
				sels[i].getElementsByTagName('option')[j].text));
				newli.onclick=function(){

					current_region = this.firstChild.firstChild.nodeValue;

					reg = current_region.replace(/\s/g,"-").toLowerCase();

					if (reg == 'all-regions') {
						reg = '';
					}

					filter_everything(cat, reg, ft);

					this.elm.value=this.v;
					ts_swapclass(this.istrigger,ts_triggeron,ts_triggeroff);
					ts_swapclass(this.parentNode,ts_dropdownopen,ts_dropdownclosed)
					this.istrigger.firstChild.nodeValue=this.firstChild.firstChild.nodeValue;
					return false;
				}
				newli.appendChild(newa);
				replaceUL.appendChild(newli);
			}
			ts_addclass(replaceUL,ts_dropdownclosed);
			var div=document.createElement('div');
			div.appendChild(replaceUL);
			ts_addclass(div,ts_boxclass);
			sels[i].parentNode.insertBefore(div,sels[i])
			toreplace[count]=sels[i];
			count++;
		}

		// initialize cat

		jQuery('.cat').click(function() {

			jQuery('.cat').removeClass('active-cat');

			jQuery(this).addClass('active-cat');

			var str = jQuery(this).text();
			str = str.replace(/\s/g,"-").toLowerCase();
			str = str.replace("&-","").toLowerCase();
			cat = str;

			if (cat == 'show-all') {
				cat = '';
			}

			filter_everything(cat, reg, ft);
		});

		// push to ft

		jQuery('#c1').click(function() {
			var i;
			var inList = false;
			for (i = 0; i < ft.length; ++i) {
				if (ft[i] == 'pdf') {
					inList = true;
				}
			}

			if(inList == true) {
				ft = jQuery.grep(ft, function(value) {
					return value != 'pdf';
				});
			} else {
				ft.push('pdf');
			}

			console.log(ft);

			filter_everything(cat, reg, ft);
		});

		jQuery('#c2').click(function() {
			var i;
			var inList = false;
			for (i = 0; i < ft.length; ++i) {
				if (ft[i] == 'external-links') {
					inList = true;
				}
			}

			if(inList == true) {
				ft = jQuery.grep(ft, function(value) {
					return value != 'external-links';
				});
			} else {
				ft.push('external-links');
			}

			console.log(ft);

			filter_everything(cat, reg, ft);
		});

		jQuery('#c3').click(function() {
			var i;
			var inList = false;
			for (i = 0; i < ft.length; ++i) {
				if (ft[i] == 'documents') {
					inList = true;
				}
			}

			if(inList == true) {
				ft = jQuery.grep(ft, function(value) {
					return value != 'documents';
				});
			} else {
				ft.push('documents');
			}

			console.log(ft);
			filter_everything(cat, reg, ft);
		});

		jQuery('#c4').click(function() {
			var i;
			var inList = false;
			for (i = 0; i < ft.length; ++i) {
				if (ft[i] == 'useful-contacts') {
					inList = true;
				}
			}

			if(inList == true) {
				ft = jQuery.grep(ft, function(value) {
					return value != 'useful-contacts';
				});
			} else {
				ft.push('useful-contacts');
			}

			console.log(ft);

			filter_everything(cat, reg, ft);
		});
	}

/*
	Turn all ULs with the class defined above into dropdown navigations
*/

	var uls=document.getElementsByTagName('ul');
	for(var i=0;i<uls.length;i++)
	{
		if(ts_check(uls[i],ts_listclass))
		{
			var newform=document.createElement('form');
			var newselect=document.createElement('select');
			for(j=0;j<uls[i].getElementsByTagName('a').length;j++)
			{
				var newopt=document.createElement('option');
				newopt.value=uls[i].getElementsByTagName('a')[j].href;
				newopt.appendChild(document.createTextNode(uls[i].getElementsByTagName('a')[j].innerHTML));
				newselect.appendChild(newopt);
			}
			newselect.onchange=function()
			{
				window.location=this.options[this.selectedIndex].value;
			}
			newform.appendChild(newselect);
			uls[i].parentNode.insertBefore(newform,uls[i]);
			toreplace[count]=uls[i];
			count++;
		}
	}
	for(i=0;i<count;i++){
		toreplace[i].parentNode.removeChild(toreplace[i]);
	}

	function ts_check(o,c)
	{
	 	return new RegExp('\\b'+c+'\\b').test(o.className);
	}
	function ts_swapclass(o,c1,c2)
	{
		var cn=o.className
		o.className=!ts_check(o,c1)?cn.replace(c2,c1):cn.replace(c1,c2);
	}
	function ts_addclass(o,c)
	{
		if(!ts_check(o,c)){o.className+=o.className==''?c:' '+c;}
	}

}

function filter_everything(cat, region, ft) {
	jQuery('#resources').children('div').show();
	if (cat == '' && region == '' && ft.length < 1) {
	} else {
		if (region.length > 0) {
			jQuery('#resources').children('div:not(.' + region  + ')').hide();
		}
		if (cat.length > 0) {
			jQuery('#resources').children('div:not(.' + cat  + ')').hide();
		}
		if (ft.length > 0) {
			var i;
			for (i = 0; i < ft.length; ++i) {
				jQuery('#resources').children('div:not(.' + ft[i]  + ')').hide();
			}
		}
	}
}


window.onload=function()
{
	tamingselect();
	// add more functions if necessary

}

jQuery(document).ready(function($){
  //Are we loaded?
  console.log('hell yeah!');

  //Let's do something awesome!

  try{Typekit.load();}catch(e){}

  $("#search").click(function() {
    $("#search-box").toggle();
  });


  //Front page link hover and slideout

  $('.home-callout a').each(function( index ){

  	$(this).click(function() {

      if($('.slide').eq(index).hasClass('active')) {
        $('.active').fadeOut();
        $('.active').removeClass('active');
      } else {
        $('.active').fadeOut();
        $('.active').removeClass('active');
        $('.slide').eq(index).fadeIn();
        $('.slide').eq(index).addClass('active');
      }

  	});


  });

  $('.content-callout a').each(function( index ){

    $(this).click(function() {

      if($('.slide').eq(index).hasClass('active')) {
        $('.active').fadeOut();
        $('.active').removeClass('active');
      } else {
        $('.active').fadeOut();
        $('.active').removeClass('active');
        $('.slide').eq(index).fadeIn();
        $('.slide').eq(index).addClass('active');
      }

    });
  });

  $(".resource-btn").click(function() {
    var customType = $( this ).data('filter');
  });

  $(".period ul").hide();

  $(".period h3").click(function() {
    $(this).next("ul").slideToggle();
  });

  var url = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

  function beginsWith(needle, haystack){
    return (haystack.substr(0, needle.length) == needle);
  };

  $('a').each(function(){

    if(typeof $(this).attr('href') != "undefined") {
      var test = beginsWith( url, $(this).attr('href') );
      //if it's an external link then open in a new tab

      

      if( test == false && $(this).attr('href').indexOf('#') == -1){
        $(this).attr('target','_blank');
      }
    }
  });

});
