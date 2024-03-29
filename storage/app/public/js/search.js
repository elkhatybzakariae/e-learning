$(document).ready(function () {
    function generatePaginationLinks(response,event) {
        let links = "<ul class='pagination'";
        for (let i = 1; i <= response.last_page; i++) {
            links += `<li class="page-item ${response.current_page === i ? 'active' : ''}">
                        <a class="page-link" name="links" href="${response.path}?page=${i}">${i}</a>
                      </li>`;
            ;
        }
        links +='</ul>'
        return links;
    }
    
    $('#courSearchForm').on('submit', function (event) {
        event.preventDefault();
        let searchInput = $('#searchInput').val();
        if ($('#bodycontent').length === 0) {
            window.location.href = "{{ route('index') }}";
        } else {
            $.ajax({
                type: 'GET',
                url: $(this).attr('action'),
                data: {
                    searchInput: searchInput
                },
                success: function (response) {
                    console.log(response);
                    var cours = document.createElement('div');
                    cours.classList.add('row');

                    var contentHTML = '<div class="container row col-12">';
                    response.data.forEach(function (cour) {
                        var courEle = `<div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="card product_item">
                            <div class="body">
                                <div class="cp_img d-flex justify-content-center align-items-center">
                                <a href="/cour/show/${cour.id_C}">
                                    <img style="width: 195px; height:195px;" src="/storage/${cour.photo}" alt="Product"
                                        class="img-fluid">
                                        </a>                                    
                                </div>
                                <div class="product_details">
                                                <h5><a href="/cour/${cour.id_C}">${cour.title}</a></h5>
                                                <ul class="product_price list-unstyled">
                                                    <li class="new_price">$${cour.price}</li>
                                                </ul>
                                            </div>
                            </div>
                        </div>
                    </div>`;
                        contentHTML += courEle;
                    });
                    contentHTML += '</div>';

                    cours.innerHTML = contentHTML;

                    const contentP = `
                        <div class="row main-content-wrap gutter-lg">
                            <div class="col-lg-12 main-content">
                                ${cours.outerHTML}
                            </div>
                        </div> 
                    `;

                    const pagination = `
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item ${response.prev_page_url ? '' : 'disabled'}">
                                                <a class="page-link" href="${response.prev_page_url ? response.prev_page_url : '#'}">Previous</a>
                                            </li>
                                            ${generatePaginationLinks(response)}
                                            
                                        ${response.links.url}
                                            <li class="page-item ${response.next_page_url ? '' : 'disabled'}">
                                                <a class="page-link" href="${response.next_page_url ? response.next_page_url : '#'}">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                `;

                    // Insert pagination after the content
                    const fullContent = contentP + pagination;
                    $('#bodycontent').html(fullContent);
                },

                error: function (error) {
                    console.error('Error occurred:', error);
                }
            });
        }

    });
});