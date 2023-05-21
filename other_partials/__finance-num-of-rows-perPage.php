<?php if (mysqli_num_rows($finance_results) < 10) : ?>
<?php else : ?>
  <div class="number-of-rows">
    <select id="itemperpage">
      <option value="11">11</option>
      <option value="21">21</option>
      <option value="31">31</option>
      <option value="41">41</option>
      <option value="51">51</option>
    </select>
    <p>per page</p>
  </div>
<?php endif ?>