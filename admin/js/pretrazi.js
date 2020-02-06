 function pretrazi(tekst) {
            var bodyTabele = document.getElementById('ajaxPodaci');
            var url = "http://localhost/projekat/proizvod/'.$proizvodjacID.'.json?search="+ tekst;
            $.getJSON(url, function(odgovorServisa) {
                bodyTabele.innerHTML = "";
                $.each(odgovorServisa.proizvod,function(i, proizvod) {
                    $("#ajaxPodaci").append("<tr>"+
                            "<td>"+ proizvod.proizvodNaziv +"</td> "+
                            "<td>"+ proizvod.brojSerije +"</td>"+
                            "<td>"+ proizvod.proizvodTiraz +"</td>"+
                            "<td>"+ proizvod.proizvodCena +"</td>" +
                            "<td>"+ proizvod.proizvodStanje +"</td>" +
                            // "<td>"+ proizvod.proizvodjacAdresa +"</td>" +
                            "</tr>");
                })
            });
        }