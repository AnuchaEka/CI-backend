
<select class=" form-control input-inline input-small input-sm"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
    @foreach($web->getDataWhere(LANG,array('active'=>0),1) as $val)
    <option @if($session->userdata('configlang')==$val['lang_iso']) selected @endif value="{{'?lang='.$val['lang_iso']}}">{{$val['lang_name']}}</option>
    @endforeach
  </select>
