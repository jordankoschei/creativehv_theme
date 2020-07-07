<?php
/*
Template Name: Scenic Hudson Passport
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?></title>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" type="application/rss+xml" title="Creative Hudson Valley" href="<?php bloginfo('url'); ?>/?feed=rss2" />

<?php if (get_home_url() == 'http://creativehv.test') : ?>
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/dev-favicon.png" sizes="16x16" />
<?php endif; ?>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-143769687-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-143769687-1');
</script>
</head>

<body class="passport-body">
  <div class="passport-container">
    <div class="passport-content">
      <div class="passport-top">
        <h1>Scenic Hudson Parks Passport</h1>
        <p>Scenic Hudson maintains <strong><a href="https://www.scenichudson.org/explore-the-valley/our-parks/" target="_blank">45 parks</a></strong> throughout the Hudson Valley. How many have you been to?</p>
        <p class="disclaimer">The page will save your selections, so you can come back later and update your progress.</p>
      </div>

      <div class="passport-lists">
        <div> <!-- Columbia -->
          <h2>Columbia County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Charles-Flood-Wildlife-Management-Area" /><span>Charles Flood Wildlife Management Area</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Harrier-Hill-Park" /><span>Harrier Hill Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Olana-Viewshed" /><span>Olana Viewshed</span></label></li>
          </ul>
        </div>

        <div> <!-- Dutchess -->
          <h2>Dutchess County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Drayton-Grant-Park-at-Burger-Hill" /><span>Drayton Grant Park at Burger Hill</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Fishkill-Ridge" /><span>Fishkill Ridge</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Hyde-Park-Trail-River-Overlook" /><span>Hyde Park Trail River Overlook</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Madam-Brett-Park" /><span>Madam Brett Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Mount-Beacon-Park" /><span>Mount Beacon Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Peach-Hill-Park" /><span>Peach Hill Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Poets-Walk-Park" /><span>Poets’ Walk Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Roosevelt-Farm-Lane-Trail" /><span>Roosevelt Farm Lane Trail</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudsons-Long-Dock-Park" /><span>Scenic Hudson’s Long Dock Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Walkway-Loop-Trail" /><span>Walkway Loop Trail</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Walkway-Over-the-Hudson-State-Historic-Park" /><span>Walkway Over the Hudson State Historic Park</span></label></li>
          </ul>
        </div>

        <div> <!-- Greene -->
          <h2>Greene County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Four-Mile-Point-Preserve" /><span>Four-Mile Point Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Mawignack-Preserve" /><span>Mawignack Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="RamsHorn-Livingston-Sanctuary" /><span>RamsHorn-Livingston Sanctuary</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudsons-Long-View-Park" /><span>Scenic Hudson’s Long View Park</span></label></li>
          </ul>
        </div>

        <div> <!-- Orange -->
          <h2>Orange County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Esty-and-Hellie-Stowell-Trailhead-at-Storm-King-Mountain" /><span>Esty & Hellie Stowell Trailhead at Storm King Mountain</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Hudson-Highlands-Nature-Museum" /><span>Hudson Highlands Nature Museum</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudson-Mine-Dock-Park" /><span>Scenic Hudson Mine Dock Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Snake-Hill" /><span>Snake Hill</span></label></li>
          </ul>
        </div>

        <div> <!-- Putnam -->
          <h2>Putnam County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Foundry-Dock-Park" /><span>Foundry Dock Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Manitou-Point-Preserve" /><span>Manitou Point Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="West-Point-Foundry-Preserve" /><span>West Point Foundry Preserve</span></label></li>
          </ul>
        </div>

        <div> <!-- Rockland -->
          <h2>Rockland County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Clausland-Mountain-Park" /><span>Clausland Mountain Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Emeline-Park" /><span>Emeline Park</span></label></li>
          </ul>
        </div>

        <div> <!-- Ulster -->
          <h2>Ulster County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Black-Creek-Preserve" /><span>Black Creek Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Bob-Shepard-Highland-Landing-Park" /><span>Bob Shepard Highland Landing Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Esopus-Meadows-Preserve" /><span>Esopus Meadows Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Falling-Waters-Preserve" /><span>Falling Waters Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Franny-Reese-State-Park" /><span>Franny Reese State Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="High-Banks-Preserve" /><span>High Banks Preserve</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Illinois-Mountain" /><span>Illinois Mountain</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Lighthouse-Park" /><span>Lighthouse Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Shaupeneak-Ridge" /><span>Shaupeneak Ridge</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Sleightsburgh-Park" /><span>Sleightsburgh Park</span></label></li>
          </ul>
        </div>

        <div> <!-- Westchester -->
          <h2>Westchester County</h2>
          <ul>
            <li><label><input class="checkbox" type="checkbox" id="Esplanade-Park" /><span>Esplanade Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Habirshaw-Park" /><span>Habirshaw Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Hudson-Highlands-Gateway-Park" /><span>Hudson Highlands Gateway Park</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Kathryn-W-Davis-RiverWalk-Center" /><span>Kathryn W. Davis RiverWalk Center</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudson-Park-at-Irvington" /><span>Scenic Hudson Park at Irvington</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudson-Park-at-Peekskill-Landing" /><span>Scenic Hudson Park at Peekskill Landing</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Scenic-Hudson-RiverWalk-Park-at-Tarrytown" /><span>Scenic Hudson RiverWalk Park at Tarrytown</span></label></li>
            <li><label><input class="checkbox" type="checkbox" id="Van-der-Donck-Park-at-Larkin-Plaza" /><span>Van der Donck Park at Larkin Plaza</span></label></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="passport-bottom">
      <p>You’ve been to <strong id="count"></strong> of <strong>45</strong> Scenic&nbsp;Hudson&nbsp;parks. <span id="snark"></span></p>
      <p class="disclaimer">This is a project from <strong><a href="https://creativehudsonvalley.com">Creative Hudson Valley</a></strong>. We’re not affiliated with Scenic Hudson — just big&nbsp;fans&nbsp;😍</p>
    </div>
  </div>

  <script>
    function storageAvailable(type) {
      var storage;
      try {
        storage = window[type];
        var x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
      }
      catch(e) {
        return e instanceof DOMException && (
          // everything except Firefox
          e.code === 22 ||
          // Firefox
          e.code === 1014 ||
          // test name field too, because code might not be present
          // everything except Firefox
          e.name === 'QuotaExceededError' ||
          // Firefox
          e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
          // acknowledge QuotaExceededError only if there's something already stored
          (storage && storage.length !== 0);
      }
    }

    let storageItems = {};
    if (storageAvailable('localStorage')) {
      if(localStorage.getItem('scenicHudsonParks')) {
        storageItems = JSON.parse(localStorage.getItem('scenicHudsonParks'));
        for (i in storageItems) {
          document.getElementById(i).checked = storageItems[i];
        }
      }
    }
  
    function updateCount() {
      let checked = Object.keys(storageItems).filter(k => storageItems[k]);
      document.getElementById('count').innerHTML = checked.length;

      var snark = '';

      if (checked.length === 0) {
        snark = 'Get out there!'
      } else if (checked.length < 3) {
        snark = 'Go explore some more!';
      } else if (checked.length < 5) {
        snark = 'Keep exploring!';
      } else if (checked.length < 10) {
        snark = 'Not bad!';
      } else if (checked.length < 20) {
        snark = 'Wow, impressive!';
      } else if (checked.length < 35) {
        snark = "Do you work for Scenic Hudson?";
      } else if (checked.length < 45) {
        snark = 'You must be Ned Sullivan!';
      } else if (checked.length >= 45) {
        snark = "You are Scenic Hudson embodied 🙌";
      }

      let snarkEl = document.getElementById('snark');
      snarkEl.innerHTML = snark;
    }

    updateCount();

    document.querySelectorAll('.checkbox').forEach(item => {
      item.addEventListener('change', ev => {
        storageItems[ev.target.id] = ev.target.checked;
        if (storageAvailable('localStorage')) {
          localStorage.setItem("scenicHudsonParks", JSON.stringify(storageItems));
        }
        updateCount();
      });
    });
  </script>

  <?php wp_footer(); ?>
</body>
</html>
