$(document).ready(function () {$("#submit-156281406").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loggingIn").fadeIn();}, data:$("#submit-156281406").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#loggingIn").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/login"});
return false;});});