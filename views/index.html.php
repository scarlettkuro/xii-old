
 <?php

      foreach($posts as $post)
      {
        echo '<a href="/' . $post->id . '">' .  $post->id . '  ' . $post->text . '</a><hr>';
      }

    ?>
<hr>
<a href="/new">+ Add</a>
