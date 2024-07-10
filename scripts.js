$(document).ready(function() {
    $('#search-bar').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('.card').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $('.year-link').on('click', function(e) {
        e.preventDefault();

        var section = $(this).data('section');
        var subject = $(this).data('subject');
        var year = $(this).data('year');
        //log
        console.log("Section:", section); 
        console.log("Subject:", subject); 
        console.log("Year:", year); 

        if (!section || !subject || !year) {
            console.error("Missing section, subject, or year data.");
            return;
        }

        $('#loading').show();
        $('#subjects').hide();

        $.ajax({
            url: 'data/' + section + '.json',
            dataType: 'json',
            success: function(data) {
                if (data[subject.toLowerCase()] && data[subject.toLowerCase()][year]) {
                    var yearData = data[subject.toLowerCase()][year];
                    var sessions = yearData.sessions;
                    var sujets = yearData.sujets;
                    var corrections = yearData.corrections;

                    var content = '<h3>' + subject + ' (' + year + ')</h3><ul>';
                    sessions.forEach(function(session) {
                        content += '<li>' + session.charAt(0).toUpperCase() + session.slice(1) + ':</li>';
                        if (sujets[session]) {
                            var lireLink = sujets[session]; // Original sharing link
                            var directLink = getDirectDownloadLink(lireLink); // Direct download link

                            content += '<ul>';
                            content += '<li>Sujet: ';
                            content += '<a href="' + lireLink + '" target="_blank">Lire</a> '; // Original link for "Lire"
                            content += '<a href="' + directLink + '" download>Télécharger</a></li>'; // Direct link for "Télécharger"
                            content += '</ul>';
                        }
                        if (corrections[session]) {
                            var lireLink = corrections[session]; // Original sharing link
                            var directLink = getDirectDownloadLink(lireLink); // Direct download link

                            content += '<ul>';
                            content += '<li>Correction: ';
                            content += '<a href="' + lireLink + '" target="_blank">Lire</a> '; // Original link for "Lire"
                            content += '<a href="' + directLink + '" download>Télécharger</a></li>'; // Direct link for "Télécharger"
                            content += '</ul>';
                        }
                    });
                    content += '</ul>';

                    $('#subjects').html(content);
                } else {
                    $('#subjects').html('<p>No data found for this year.</p>');
                }
                $('#loading').hide();
                $('#subjects').show();
            },
            error: function() {
                $('#subjects').html('<p>Error loading data.</p>');
                $('#loading').hide();
                $('#subjects').show();
            }
        });
    });
});

/* Direct link function */
/* Direct link function */
function getDirectDownloadLink(url) {
    // Example input URL: https://drive.google.com/file/d/FILE_ID/view?usp=sharing
    // Extract FILE_ID using regular expression
    var match = url.match(/\/file\/d\/([a-zA-Z0-9_-]+)/);
    if (!match) {
        match = url.match(/\/file\/([a-zA-Z0-9_-]+)/);
    }
    
    if (match && match.length > 1) {
        var fileId = match[1];
        // Construct direct download link
        var directLink = "https://drive.google.com/uc?export=download&id=" + fileId;
        return directLink;
    } else {
        console.error("Failed to extract FILE_ID from URL:", url);
        return url; // Return original URL if extraction fails
    }
}
