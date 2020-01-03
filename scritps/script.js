///// Styles button interactions /////
$('#style-white-black-btn').click(function(){
    trans();
    $('nav').removeClass('navbar-dark').addClass('navbar-light');
    document.documentElement.setAttribute('data-theme', 'white-black-layout');
});
$('#style-black-white-btn').click(function(){
    trans();
    $('nav').removeClass('navbar-light').addClass('navbar-dark');
    document.documentElement.setAttribute('data-theme', 'black-white-layout');
});
$('#style-yellow-black-btn').click(function(){
    trans();
    $('nav').removeClass('navbar-dark').addClass('navbar-light');
    document.documentElement.setAttribute('data-theme', 'yellow-black-layout');
});
$('#style-black-yellow-btn').click(function(){
    trans();
    $('nav').removeClass('navbar-light').addClass('navbar-dark');
    document.documentElement.setAttribute('data-theme', 'black-yellow-layout');
});

///// Font size button interactions /////
$('#font-small-btn').click(function(){
    document.documentElement.setAttribute('data-font', 'small-font');
});
$('#font-medium-btn').click(function(){
    document.documentElement.setAttribute('data-font', 'medium-font');
});
$('#font-large-btn').click(function(){
    document.documentElement.setAttribute('data-font', 'large-font');
});

///////// Colors transition ////////
let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(()=>{
        document.documentElement.classList.remove('transition')
    },1000);
}