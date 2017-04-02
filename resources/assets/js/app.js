$(document).on('submit', '#delete-form', function(event) {
	return confirm("¿Desea borrar el dato?");
});

$('.editor').trumbowyg();  
    
if($("#article").length){
    
    var citynames = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: {
        url: 'http://'+window.location.hostname+'/admin/tags',
        filter: function(list) {
          return $.map(list, function(cityname) {
            return { name: cityname }; });
        }
      }
    });

    citynames.initialize();

    $("input[name='tags']").tagsinput({
      typeaheadjs: {
        name: 'tags',
        displayKey: 'name',
        valueKey: 'name',
        source: citynames.ttAdapter()
      }
    });
}

 

$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');
        
    });
   
   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');
    });
   $(document).on('change', "input[name='image']", function(event) {
        event.preventDefault();
        var element=$(this);

        var reader= new FileReader();
        reader.onload=function(e)
        { 
            var id=element.attr('id');
            var data={article_id:id,image:e.target.result};
           $.ajax({
                url:'/admin/images',
                headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
                type: 'POST',
                dataType: 'html',
                data: data
            })
            .done(function(data) {
                console.log("success");
                $(".image-container").append(data);
            })
            .fail(function(error) {
                console.log("error");
                console.log(error.responseText);
            })
            .always(function() {
                console.log("complete");
            });
        }
        reader.readAsDataURL(this.files[0]);
                
    });

$(document).on('click', "button[name='image-delete']",function(event){

    event.preventDefault();
    var id=$(this).attr('id');
    var element=$(this);
   $.ajax({
        url:'/admin/images/'+id,
        type: 'DELETE',
        headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
        dataType: 'json' 
    })
    .done(function(data) {
        console.log("success");
        if(data.id > 0){
            element.parent().parent().parent().remove();
        }
    })
    .fail(function(error) {
        console.log("error");
        console.log(error.responseText);
    })
    .always(function() {
        console.log("complete");
    });
    
    return false;
    });
//////------------------------------------------------
    $(document).on('click', ".social-buttons > a",function(event){

        event.preventDefault();

        alert("hola");

        var slug=$(this).attr('name');

        $.ajax({
            url:'/articles/shared/'+slug,
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
            dataType: 'json'
        })
        .done(function(success) {
            console.log("success");
        })
        .fail(function(error) {
            console.log("error");
            console.log(error.responseText);
        })
        .always(function() {
            console.log("complete");
        });

    return false;
    });
//////------------------------------------------------
    $(".social-buttons").ready(function(){

        var slug=$(".social-buttons").children('a:first').attr('name');

        if(slug!=null || slug!=undefined){
        
            $.ajax({
                url:'/articles/visited/'+slug,
                type: 'GET',
                headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
                dataType: 'json'
            })
            .done(function(success) {
                console.log("success");
            })
            .fail(function(error) { 
                console.log("error");
                console.log(error.responseText);
            })
            .always(function() {
                console.log("complete");
            });
        }

        return false;
    });

    $(document).on('click',"#subscribe",function(event){

        var email=$("input[name='email']").val();
        var exp = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);

        if (!exp.test(email)){
            alert("Revisa tu correo");
        }else{
            $.ajax({
                url:'/subscribe',
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")},
                dataType: 'HTML',
                data:{email:email}
            })
            .done(function(success) {
                console.log("success");
                $("input[name='email']").val('');
                $("#subscribe").html('Gracias').prop('disable', 'disabled');
            })
            .fail(function(error) { 
                console.log("error");
                console.log(error.responseText);
            })
            .always(function() {
                console.log("complete");
            });
        }

         return false;
        });

});
