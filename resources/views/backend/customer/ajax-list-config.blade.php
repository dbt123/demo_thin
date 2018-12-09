<tr>
   <td>Chi tiêu tối thiểu</td>
   <td style="width: 46%;">% Giảm giá tối thiểu</td>
</tr>

  <?php $Configure_discounts = App\Configure_discounts::orderby('targets','asc')->get();?>
  @if(sizeof($Configure_discounts))
      @foreach($Configure_discounts as $value)
      <tr id="d_0">
           <td colspan="2">
             <div class="input" style="width: 50%;float:left; padding-right:10px;">
                <input type="text" name="chi_tieu[]" value="{!! $value->targets !!}" autocomplete="off">
                  <div class="d-toll"><span class="price"></span></div>
             </div>
             <div class="input" style="width: 50%;float:left;padding-left:10px;">
                <input type="text" name="giam_gia[]" value="{!! $value->percent !!}" autocomplete="off">
                  <div class="d-toll"><span class="pt"></span></div>
             </div>
             <input type="hidden" name="id[]" value="{!! $value->id !!}">
             <div style="clear:both;"></div>
         </td>
         <td class="d-123">
             <a href="javascript:void(0);" style="float:right;font-size: 17px;color: #e60d09;font-weight: 700;" id="d_1" name="del" class="cancel-tr" data-value="{!! $value->id !!}">
                 ×
             </a>
         </td>
      </tr>
      @endforeach
  @endif  
<tr>
   <td colspan="2">
       <div class="input" style="width: 50%;float:left; padding-right:10px;">
          <input type="text" name="chi_tieu1" autocomplete="off">
            <div class="d-toll"><span class="price"></span></div>
            
       </div>
       <div class="input" style="width: 50%;float:left;padding-left:10px;">
          <input type="text" name="giam_gia1" autocomplete="off" >
            <div class="d-toll"><span class="pt"></span></div>
       </div>
       <input type="hidden" name="id1" value="0">
       <span style="display:none;text-align:center;color:red;" id="d-2">Giá trị phải được sắp xếp từ nhỏ tới lớn và nhỏ hơn 100%</span>
       <p style="text-align:center; display:none;color:red;" id="d-1">Xin vui lòng nhập đủ dữ liệu</p>
       <div style="clear:both;"></div>
   </td>

</tr>