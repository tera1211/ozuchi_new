function getLastPart(url){
    var parts=url.split("/");
    return (url.lastIndexOf('/') !== url.length -1 ? parts[parts.length - 1] : parts[parts.length -2]);
}


switch(getLastPart(window.location.href)){
    case 'village.html':
        $('.village-link').addClass('current');
        break;
    case 'people.html':
        $('.people-link').addClass('current');
        break;
    case 'gallery.html':
        $('.gallery-link').addClass('current');
        break;
    case 'access.html':
        $('.access-link').addClass('current');
        break;
    case 'contact.php':
    case 'contact.php?result=Thank%20you%20for%20your%20inquiry!':
        $('.contact-link').addClass('current');
        break;
}

$('#gnav__icon').on('click',()=>{
    $('#gnav').addClass('invisible');
    $('#section').addClass('invisible');
    $('#gnav__menu--small').children().addClass('active');
    $('#gnav__close-icon').addClass('active');
});

$('#gnav__close-icon').on('click',event=>{
    setTimeout(()=>{
        $('#gnav').removeClass('invisible');
        $('#section').removeClass('invisible');
    },800);
    $('#gnav__menu--small').children().removeClass('active');
    $(event.currentTarget).removeClass('active');
});