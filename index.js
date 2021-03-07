/**
 * Editor
 */
// const $editor = document.getElementById('editor')

BalloonEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );