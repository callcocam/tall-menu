

function deleteItem(data) {
    return {
        title: data.title,
        description: data.description,
        icon: 'error',
        method: 'kill',
        params: data.id
    }
}