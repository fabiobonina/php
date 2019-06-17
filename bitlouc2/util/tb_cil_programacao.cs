using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bitlouc
{
    #region Tb_cil_programacao
    public class Tb_cil_programacao
    {
        #region Member Variables
        protected int _id;
        protected int _loja_id;
        protected int _local_id;
        protected unknown _data;
        protected unknown _status;
        #endregion
        #region Constructors
        public Tb_cil_programacao() { }
        public Tb_cil_programacao(int loja_id, int local_id, unknown data, unknown status)
        {
            this._loja_id=loja_id;
            this._local_id=local_id;
            this._data=data;
            this._status=status;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual int Loja_id
        {
            get {return _loja_id;}
            set {_loja_id=value;}
        }
        public virtual int Local_id
        {
            get {return _local_id;}
            set {_local_id=value;}
        }
        public virtual unknown Data
        {
            get {return _data;}
            set {_data=value;}
        }
        public virtual unknown Status
        {
            get {return _status;}
            set {_status=value;}
        }
        #endregion
    }
    #endregion
}