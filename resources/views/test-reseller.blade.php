
<form method="POST" action="{{ route('kirim-reseller') }}">
    @csrf
    <h4>Ini id user</h4>
    <input type="text" name="id_user" value=""> <br>
    <h4>jumlah_produk</h4>
                    <input type="number" name="jumlah_produk[]" value="0"> <br>
    <h4>id produk</h4>
                    <input type="number" name="id_produk[]" value="">
                </td>
            </tr>

        </tbody>
    </table>

    <!-- Tombol Submit -->
    <button type="submit">Submit</button>
</form>
