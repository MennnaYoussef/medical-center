$(".student").click(function(){
    $(".content").load("student.php")
})

$(".formsearchbtn").click(function(){
    $(".searchform").slideToggle(1000)
})

$(".addstudentbtn").click(function(){
    $(".showform").slideDown(1000)
})

$(".exit").click(function(){
    $(".editform").slideUp(1000)
})
$(".exitt").click(function(){
    $(".showform").slideUp(1000)
})

$(".edit").click(function(){
    $(".editform").slideDown(1000)
})
