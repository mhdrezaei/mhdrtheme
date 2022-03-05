<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.add_techno_item').on('click', function (event) {
            var wrapper = $('.technologies_item_wrapper');
            var item = '<p>\n' +
                '        <input style="width: 85%" type="text" name="technologies[]">\n' +
                '        <a class="remove_techno_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>\n' +
                '    </p>'
            event.preventDefault();
            wrapper.append(item);

        });
        $(document).on('click', '.remove_techno_item', function (event) {
            event.preventDefault();
            var $this = $(this);
            $this.parent().slideUp().remove();


        })

    });
</script>
<p>
    <a href="#" id="" class="button button-primary add_techno_item">اضافه کردن تصویر برای این پروژه</a>
</p>
<?php if (isset($technologies) && $technologies!= null ): ?>
<?php foreach ($technologies as $technology): ?>
<p>
<input type="text" style="width: 85%" name="technologies[]" value="<?php echo $technology; ?>" >
<a class="remove_techno_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
</p>
	<?php endforeach; ?>
<?php else : ?>
<p>
    <input type="text" style="width: 85%" name="technologies[]" value="" >
    <a class="remove_techno_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
</p>
<?php endif; ?>

<div class="technologies_item_wrapper">


</div>