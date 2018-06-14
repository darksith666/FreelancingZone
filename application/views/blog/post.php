
 <div class="singleBlogArea secPdng">
   <div class="container">
     <div class="row">
       <div class="col-md-10 col-md-offset-1 sBlogCol">
         <article class="singleBlog">
           <div class="blogImg animated"><img src="/resources/uploads/blog_files/<?php echo $post["top_image"]; ?>" alt="" class="img-thumbnail"></div>
           <div class="postTitle h3 animated"><?php echo $post["title"]; ?></div>
           <div class="postMeta animated">
             <div class="postDate"><?php echo $post["creationdate"]; ?></div><br/>
             <div class="author">by <span><?php echo $post["author"]; ?></span></div>
           </div>
           <div class="postText animated">
             <p><?php echo $post["body"]; ?></p>
           </div>
           <br/>
           <div class="sharethis-inline-share-buttons"></div>
           <br/>
           <br/>
           <div class="sectionBar"></div>
           <br/>
           <a href="/blog"><< Go back</a>
         </article>
       </div>
     </div>
   </div>
 </div>
