$(document).ready(function () {$("#submit-975087077").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#saving").fadeIn();}, data:$("#submit-975087077").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#saving").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/users\/add"});
return false;});});