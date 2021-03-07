/**
 * Editor
 */
// const $editor = document.getElementById('editor')

BalloonEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );




// if ($editor instanceof HTMLElement) {
//   BalloonEditor.create($editor, {
//     ckfinder: {
//       uploadUrl: '/image/upload.php'
//     }
//   }).then(editor => {
//     editor.editing.view.focus()
//     const $form = document.querySelector('#main__form-post > form')
//     $form.addEventListener('submit', e => {
//       const data = document.createTextNode(editor.getData())
//       document.querySelector('#main__form-post textarea[name=content]').appendChild(data)
//     })
//   })
// }