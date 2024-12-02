const deleteForm = document.querySelector('#delete-form')

deleteForm.addEventListener('submit', e => {
  e.preventDefault()

  if (confirm('本当に削除しますか')) {
    // deleteForm.submit()
    e.target.submit()
  }
})