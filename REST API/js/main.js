(function ($, document) {

        var portfolio_btn = document.getElementById('portfolio-btn');
        var portfolio_inner_block = document.getElementById('portfolio-inner-block');
        var quick_add_button = document.querySelector("#quick-add-button");
    if (portfolio_btn) {
            portfolio_btn.addEventListener('click', function () {
                console.log('click');
                var ourRequest = new XMLHttpRequest();
                ourRequest.open('GET', magicalData.siteURL + '/wp-json/wp/v2/posts?categories=4&order=asc');
                ourRequest.onload = function() {
                    if (ourRequest.status >= 200 && ourRequest.status < 400) {
                        var data = JSON.parse(ourRequest.responseText);
                        console.log(data);
                        createHTML(data);
                        portfolio_btn.remove();
                    } else {
                        console.log("We connected to the server, but it returned an error.");
                    }
                };

                ourRequest.onerror = function() {
                    console.log("Connection error");
                };

                ourRequest.send();

        });
    }
    function createHTML(postsData){
        var ourHTML = " ";
        for (i=0; i < postsData.length; i++) {
            ourHTML += '<h2>' + postsData[i].title.rendered + '</h2>';
            ourHTML += postsData[i].content.rendered;
        }
        portfolio_inner_block.innerHTML = ourHTML;
    }


// Quick Add Post AJAX

    if (quick_add_button) {
        quick_add_button.addEventListener("click", function() {
            var ourPostData = {
                "title": document.querySelector('.admin-quick-add [name="title"]').value,
                "content": document.querySelector('.admin-quick-add [name="content"]').value,
                "status": "publish"
            };

            var createPost = new XMLHttpRequest();
            createPost.open("POST", magicalData.siteURL + "/wp-json/wp/v2/posts");
            createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
            createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            createPost.send(JSON.stringify(ourPostData));
            createPost.onreadystatechange = function() {
                if (createPost.readyState == 4) {
                    if (createPost.status == 201) {
                        document.querySelector('.admin-quick-add [name="title"]').value = '';
                        document.querySelector('.admin-quick-add [name="content"]').value = '';
                    } else {
                        alert("Error - try again.");
                    }
                }
            }
        });
    }

})(jQuery,document);