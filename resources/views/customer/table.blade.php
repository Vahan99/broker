<div class="col-sm-12 card-box">
    <div class="table-responsive">
        @if(count($customers) > 0)
            <table class="table table-bordered m-0">
                <thead  id="subRegionTableHeade">
                <tr>
                    <th>#</th>
                    <th>Հաճախորդ</th>
                    <th>Անուն</th>
                    <th>Ազգանուն</th>
                    <th>էլ․ հասցե</th>
                    <th>Բջջ․</th>
                    <th>Քաղ․</th>
                </tr>
                </thead>
                <tbody id="subRegionTableBody">
                @foreach ($customers as $key => $customer)
                    <tr class="clickable {{$key % 2 == 0 ? 'odd' : ''}}" data-route="{{route('customer.single', ['id' => $customer->id]) . '/?filter=1'}}">
                        <td>{!! $customer->id !!}</td>
                        <td>{!! $customerData->types()[$customer->customer]['label'] !!}</td>
                        <td>{!! $customer->name !!}</td>
                        <td>{!! $customer->surname !!}</td>
                        <td>{!! $customer->email !!}</td>
                        <td>{!! $customer->first_phone !!}</td>
                        <td>{!! $customer->last_phone !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Տվյալներ չեն գտնվել</p>
        @endif
    </div>
</div>