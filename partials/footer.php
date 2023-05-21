</main>


<!-- js files -->
<script src="<?= ROOT_URL ?>js/all.min.js" type="text/javascript"></script>
<script src="<?= ROOT_URL ?>js/index.js" type="text/javascript"></script>
<script src="<?= ROOT_URL ?>js/pagination.js" type="text/javascript"></script>
<script src="<?= ROOT_URL ?>js/ellipse.js" type="text/javascript"></script>
<script src="<?= ROOT_URL ?>js/toggle.js" type="text/javascript"></script>


</body>

</html>

<script>
  const navbarLinkItem = document.querySelectorAll('.navbar-items a');
  const activePage = window.location.pathname;
  navbarLinkItem.forEach(link => {
    if (link.href.includes(`${activePage}`)) {
      link.classList.add('active');
    }
  });
</script>