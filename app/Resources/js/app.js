var $collectionHolder;

// setup an "add a posten" link
var addPostenLink = $('<a href="#" class="add_posten_link">Add a posten</a>');
var $newLinkLi = $('<li></li>').append(addPostenLink);

jQuery(document).ready(function () {
    // Get the ul that holds the collection of posten
    $collectionHolder = $('ul.posten');

    // add the "add a posten" anchor and li to the posten ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    addPostenLink.on('click', function (e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new posten form (see next code block)
        addPostenForm($collectionHolder, $newLinkLi);
    });
});
function addPostenForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a posten" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
}