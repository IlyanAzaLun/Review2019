		    </div>
		</div>

	</div>
      <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>❰code❱ with 🖤 by <a href="https://github.com/ilyanazalun/"> <strong>Ilyan Aza-lun</strong></a> &copy; 2019</span>
        </div>
      </div>
      <div class="container my-auto copyright">
        <span><?$executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
        echo "This script took $executionTime sec to execute."; ?></span>
      </div>
    </footer>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>	
</body>
</html>