export default function ({ $auth, redirect }) {
  if (!$auth.hasScope('employee')) {
    return redirect('/')
  }
}
