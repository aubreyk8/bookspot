<script language="JavaScript" type="text/javascript">

    function click_a58d7da80e7e062efc9bbef7294458d6( aform_reference ) {
        var aform = aform_reference;
        aform['amount'].value = Math.round( aform['amount'].value*Math.pow( 10,2 ) )/Math.pow( 10,2 );
    }

</script>

<form
    action="https://www.payfast.co.za/eng/process"
    name="form_a58d7da80e7e062efc9bbef7294458d6"
    onsubmit="return click_a58d7da80e7e062efc9bbef7294458d6( this );"
    method="post"
>
    <input type="hidden" name="cmd" value="_paynow">
    <input type="hidden" name="receiver" value="11097186">
    <input type="hidden" name="item_name" value="eBook: {{ $book->title }}">
    <input type="hidden" name="amount" value="{{ $book->price }}">
    <input type="hidden" name="item_description" value="eBook: {{ $book->title }} by {{ $book->author->first_name }} {{ $book->author->last_name }}">
    <input type="hidden" name="return_url" value="{{ route('checkout.success', ['id' => base64_encode($order->id)]) }}">
    <input type="hidden" name="cancel_url" value="{{ route('checkout.cancelled', ['id' => base64_encode($order->id)]) }}">

    <table>
        <tr>
            <td colspan=2
                align=center
            >
                <input
                    type="image"
                    src="https://www.payfast.co.za/images/buttons/light-small-paynow.png"
                    width="165"
                    height="36"
                    alt="Pay Now"
                    title="Pay Now with PayFast"
                >
            </td>
        </tr>
    </table>
</form>
