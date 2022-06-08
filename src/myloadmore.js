jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	$('.loadmore').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : loadmore_params.current_page,
            'post_type':  loadmore_params.post_type,
		};
        
        const post = (item) => {
            return `
            <article class="my-3 col-4">
                    <div class="card slider-block__card">
                        <a href="${item.url}" class="card-img-block">
                            <img src="${item.image}" class="card-img-top img-ratio" alt="Card Img">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">
                                ${item.title}
                            </h5>
                        <div class="card__category mb-2">
                        ${item.tax.map(el => {
                            return `
                            <a href="http://sweeftacademy.local/course_type/${el.slug}">
                                ${el.name}
                            </a>`
                        }).join('')}
                        </div>
                        <p class="card-text">
                            ${item.excerpt}
                        </p>
                        <a href="${item.url}" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </article>
            
            
            `
        }

		$.ajax({ // you can also use $.post here
			url : "http://sweeftacademy.local/wp-admin/admin-ajax.php", // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
                console.log('bfr');
			},
			success : function( data ){
                console.log(data);
				if( data ) { 
					button.text( 'More posts' ).prev().before(data); // insert new posts
					loadmore_params.current_page++;
                    $('.tax-course_type .row').append( data.data.posts.map((item) => post(item)).join(''));
					if ( loadmore_params.current_page == loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
                    
					// you can also fire the "post-load" event here if you use a plugin that requires it
					// $( document.body ).trigger( 'post-load' );
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});