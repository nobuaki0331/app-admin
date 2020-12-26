import { saveAs } from 'file-saver'

export default function downloadFile(url, axiosParams = {}, responseType = 'blob') {
  axios.get(url, {
    ...axiosParams,
    responseType,
  }).then(response => {
    const blob = new Blob([response.data], {
      type: response.data.type,
    })
    const contentDisposition = response.headers['content-disposition']
    const startPos = contentDisposition.indexOf('filename="') + 10
    const filename = contentDisposition.substr(
      startPos,
      contentDisposition.length - startPos - 1,
    )
    saveAs(blob)
  })
}
