$("[name='cntr_no']").attr("disabled",true);
$("[name='vsl_cd']").attr("disabled",true);

if($("[name='rango']").val().length !== 0){
    $("[name='cntr_no']").removeAttr("disabled");
    $("[name='vsl_cd']").removeAttr("disabled");
}