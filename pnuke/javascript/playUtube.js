function playit(video)
{
    var has_play_url = 'yes';
    var use_dimensions = 'yes';
    var video_url = 'http://www.youtube.com/v/' + video + '.swf';

	// Later on we should check to see if a SWF id available
	// NOTE: It is imperative that the new open window name is a single word (no spaces)
    if(has_play_url && use_dimensions) { 
        window.open(video_url, 'Us4Earth_Video_Player', 'height=300,width=375,resizable=1,scrollbars=1,menubar=1');
    	return false;   
    }
    return true;
}

// As is typical, accommodate IE non conforming bullshit
function IEplayit(video)
{

    var has_play_url = 'yes';
    var use_dimensions = 'yes';
    var video_url = 'http://www.youtube.com/v/' + video + '.swf';

	// Later on we should check to see if a SWF id available
    if(has_play_url && use_dimensions) { 
alert("length=" + parent.frames["postwrap-content"].window);
// parent.frames["postwrap-content"].window.open(video_url);	// works - full sz window
// window.open(video_url, "Us4Earth Video Player");	// BAD: Can't have spaces in the name
		window.open (video_url,"Us4Earth_Video_Player","menubar=1,resizable=1,width=400,height=300"); 
    	return false;   
    }
    return true;
}
