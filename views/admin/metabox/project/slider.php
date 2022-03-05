<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('.add_slider_item').on('click', function (event) {
            var wrapper = $('.sliders_item_wrapper');
            var item = '<p>\n' +
                '        <input style="width: 85%" type="text" name="sliders[]">\n' +
                '        <a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>\n' +
                '    </p>'
            event.preventDefault();
            wrapper.append(item);

        });
        $(document).on('click', '.remove_slider_item', function (event) {
            event.preventDefault();
            var $this = $(this);
            $this.parent().slideUp().remove();


        })

    });
</script>

<p>
	<a href="#" id="" class="button button-primary add_slider_item">اضافه کردن تصویر برای این پروژه</a>
</p>

<?php if (isset($slider_images) && $slider_images!= null ): ?>
	<?php foreach ($slider_images as $slider_image): ?>
		<p>
		<input type="text" style="width: 85%"  name="sliders[]" value="<?php echo $slider_image ;?>">
	<a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
	</p>
<?php endforeach; ?>
<?php else : ?>
	<p>
		<input style="width: 85%" type="text" name="sliders[]">
		<a class="remove_slider_item" href="#"><span class="dashicons dashicons-dismiss"></span></a>
	</p>

<?php endif; ?>

<div class="sliders_item_wrapper">


</div>
