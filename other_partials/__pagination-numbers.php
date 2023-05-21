<?php if (mysqli_num_rows($fetch_members_query_results) < 10) : ?>
<?php else : ?>
  <!-- pagination -->
  <div class=" bottom-field">
    <ul class="pagination">
      <li class="prev"><a href="#" id="prev">&#139;</a></li>
      <li class="next"><a href="#" id="next">&#155;</a></li>
    </ul>
  </div>
<?php endif ?>