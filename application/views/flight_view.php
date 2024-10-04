<div class="form-group">
    <label for="from"><i class="bi bi-geo-alt"></i> From:</label>
    <div class="dropdown">
        <button onclick="myFunction('from')" class="dropbtn">Select From</button>
        <div id="fromDropdown" class="dropdown-content">
            <input type="text" name="from" placeholder="City or Airport" id="fromInput" onkeyup="filterDropdown('from')">
            <?php foreach ($fromLocations as $location) : ?>
                <a href="#" onclick="selectDropdown('from', '<?= $location->from_location; ?>')"><?= $location->from_location; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="to"><i class="bi bi-geo-alt"></i> To:</label>
    <div class="dropdown">
        <button onclick="myFunction('to')" class="dropbtn">Select To</button>
        <div id="toDropdown" class="dropdown-content">
            <input type="text" name="to" placeholder="City or Airport" id="toInput" onkeyup="filterDropdown('to')">
            <?php foreach ($toLocations as $location) : ?>
                <a href="#" onclick="selectDropdown('to', '<?= $location->to_location; ?>')"><?= $location->to_location; ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    function myFunction(dropdownType) {
        document.getElementById(dropdownType + "Dropdown").classList.toggle("show");
    }

    function filterDropdown(dropdownType) {
        var input, filter, div, a, i;
        input = document.getElementById(dropdownType + "Input");
        filter = input.value.toUpperCase();
        div = document.getElementById(dropdownType + "Dropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < script a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function selectDropdown(dropdownType, value) {
        document.getElementById(dropdownType + "Input").value = value;
        document.getElementById(dropdownType + "Dropdown").classList.remove("show");
    } <
    />