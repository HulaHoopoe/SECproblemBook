const rows = document.querySelectorAll("tr")

rows.forEach((row) => {
	if (row === rows[0]) return
	row.addEventListener("click", () => {	
		rows.forEach((row2) => {
			if (row !== row2)
			row2.classList.remove("chosen")
		})
		
		row.classList.toggle("chosen")
	})
})