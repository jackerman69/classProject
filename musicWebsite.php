 <?php
		$dbc = mysqli_connect("localhost", "root", "", "Music Website") or die("Bad Connect: ".mysqli_connect_error());

		$sql = "SELECT * FROM Pop";

		$result = mysqli_query($dbc, $sql) or die("Bad Query: $sql");

        echo"<table id = 'database'>";
        echo"<tr id = 'tableHead'>
                <td class = 'titleCells'>Title</td>
                <td class = 'titleCells'>Artist</td>
                <td class = 'titleCells'>Album</td>
                <td class = 'titleCells'>YouTube</td>
                <td class = 'titleCells'>Genre</td>
                <td class = 'titleCells'>Add to Playlist</td>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo"<tr>
                    <td class = 'cells'>{$row['Title']}</td>
                    <td class = 'cells'>{$row['Artist']}</td>
                    <td class = 'cells'>{$row['Album']}</td>
                    <td class = 'cells'><a href='" . $row['YouTube'] . "'target = _blank>" . $row['YouTube'] . "</a></td> 
                    <td class = 'cells'>{$row['Genre']}</td>
                    <td id = 'add' class = 'cells'>"?>
                    <form action='' method='POST'>
                    <input type='submit' name='submit' value="+"/>
                    </form><?
                    if(isset($_POST['submit'])) {
                        $sql2 = "INSERT INTO Playlist(`ID`, `Title`, `Artist`, `Album`, `YouTube`, `Genre`)
                                SELECT `ID`, `Title`, `Artist`, `Album`, `YouTube`, `Genre`FROM Pop WHERE ";
                    } echo"</td>
                </tr>"; 
        }
        echo "</table>";
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<br> Title: ". $row['Title']. " Artist: ". $row["Artist"]. " Album: ". $row["Album"]. "YouTube: ". $row["YouTube"]. "Genre: ". $row["Genre"]. "Add to Playlist: ". $row["Add to Playlist"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}

		$dbc->close();
	?>
