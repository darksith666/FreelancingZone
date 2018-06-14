
    <!-- ======= /2.01 Page Title Area ====== -->

    <div class="blogArea secPdng">

    	<div class="container">
    		<div class="row">

          <div class="col-md-8">
            <?php foreach($posts as $post) { ?>
    				<div class="singlePost">
    					<div class="postImg"><a href="/blog/article/<?php echo $post["id_blog"]; ?>/<?php echo sluggify($post["title"]); ?>"><img src="/resources/uploads/blog_files/<?php echo $post["top_image"]; ?>" alt=""></a></div>
    					<div class="postContent">
    						<a href="/blog/article/<?php echo $post["id_blog"]; ?>/<?php echo sluggify($post["title"]); ?>" class="postTitle h4"><?php echo $post["title"]; ?></a>
    						<div class="postDate"><?php echo $post["creationdate"]; ?></div>
    						<div class="postExcerpt">
    							<p>
                    <?php echo substr(strip_tags($post["body"]), 0, 400); ?>...
                  </p>
    						</div>
    					</div>
    				</div><br/>
            <?php } ?>

            <?php display_paging_blogs($paging); ?>
    			</div>

          <div class="col-md-4">

            <div class="singleService">
                <div class="serviceIcon">
                    <img src="/resources/main/img/icon/serv-04.png" alt="">
                </div>
                <div class="serviceContent">
                    <span class="h3">Welcome to our blog :)</span>
                    <p>
                      Learn new tricks and get the best tips for <br/>
                      a successful freelancing career.
                    </p>
                </div>
            </div>

          </div>

    		</div>

    	</div>

    </div>
