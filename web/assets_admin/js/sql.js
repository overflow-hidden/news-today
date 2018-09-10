$(function () {
    // 删除
    $('.table').on('click','.remove',function () {
        let id = $(this).closest('tr').attr('data-id');
        $.ajax({
            url:'/admin.php',
            data:{
                c:'news',
                m:'delete',
                id:id
            },
            success:function () {
                location.reload();
            }
        })
    })
    // 新增
    $('#add').on('click',function () {
        $.ajax({
            url:'/admin.php',
            data:{
                c:'news',
                m:'insert'
            },
            success:function () {
                location.reload()
            }
        })
    })
    // 修改
    $('.table').on('blur','.inputs',function () {
        let type = $(this).attr('data-type');
        let value = $(this).val();
        let id = $(this).closest('tr').attr('data-id');
         $.ajax({
             url:'admin.php',
             data:{
                 c:'news',
                 m:'update',
                 k:type,
                 v:value,
                 id:id
             },
             success:function () {
                 location.reload()
             }
         })

    })
})