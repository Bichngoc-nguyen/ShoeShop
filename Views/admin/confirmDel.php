<script language="javascript"> 
    function deletePD(delId){ 
        if (confirm("Are you sure you want to delete this data? ")==true){ 
            window.location.href="deleteProduct.php?id=" + delId; 
        }
    } 
</script>