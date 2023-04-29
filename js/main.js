$('#gnav').load('gnav.html');
$('#language').load('language.html')
$('#footer').load('footer.html');
$('#gnav__menu--small').load('small-gnav.html');

$(document).ready(()=>{
    
    $(function(){

        //fade-in animation when scrolling
        $(window).scroll(function (){
            $('.fadein').each(function(){
                var elemPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight){
                    $(this).addClass('scrollin');
                }
            });
            $('.fadeinLeft').each(function(){
                var elemPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight +100){
                    $(this).addClass('scrollin');
                }
            });
            $('.fadeinRight').each(function(){
                var elemPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > elemPos - windowHeight +100){
                    $(this).addClass('scrollin');
                }
            });
        });
        $("form").on("submit", function onsubmit(event){
            $(this).off("submit").on("submit", false);
        });

        //Smooth scroll animation
        $('a[href^="#"]').click(function(){
            //scroll Speed
            var speed=900;
            //get the link source
            var href=$(this).attr("href");
            //get the link target
            var target= $(href == "#" || href== "" ? 'html' : href);
            //get the distance to the link target
            var position = target.offset().top;
            //smooth scroll
            $("html, body").animate({scrollTop:position}, speed, "swing");
            return false;
        });
    });

    //people page show button
    $('.btn-show').on('click', event=>{
        $(event.currentTarget).toggleClass('show');
    });
    $('.btn-show--jp').on('click', event=>{
        $(event.currentTarget).toggleClass('show');
    });
    $('.btn-show--cn').on('click', event=>{
        $(event.currentTarget).toggleClass('show');
    });

    $('#nobo-show').on('click',()=>{
        $('#nobo-detail').toggle('fold');
    });
    $('#toru-show').on('click',()=>{
        $('#toru-detail').toggle('fold');
    });
    $('#machi-show').on('click',()=>{
        $('#machi-detail').toggle('fold');
    });
    $('#tera-show').on('click',()=>{
        $('#tera-detail').toggle('fold');
    });
    $('#language').on('click',()=>{
        $('#language-list').slideToggle();
        $('#language-array').toggleClass("active");
    });
    $('#contactForm').validate({
        
        submitHandler:function(form){
            var dataparam = $('#contactForm').serialize();
            $.ajax({
                type:'POST',
                async:true,
                url:'process.php',
                data: dataparam,
                datatype:JSON,
                cache:true,
                global:false,
                beforeSend:function(){
                    $('#loading').fadeIn();
                    $('#sendBtn').addClass('active').prop('disabled',true);
                    $('#backBtn').prop('disabled',true);
                    $('#status').addClass('active');
                },
                success:function(data){
                    if(data == 'success'){
                        console.log('success');
                    }else{
                        console.log('something wrong');
                    }
                },
                complete:function(){
                    $('#sendBtn').removeClass('active').prop('disabled',false);
                    $('#backBtn').prop('disabled',false);
                    $('#loadIcon').hide();
                    $('#status').removeClass('active');
                    $('#completeIcon').show();
                    window.location.replace('./contact.php?result=Thank you for your inquiry!');
                }
            })
        }
    })

});